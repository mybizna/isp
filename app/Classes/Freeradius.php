<?php

namespace Modules\Isp\Classes;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Isp\Modelsateway;
use Modules\Isp\Modelsackage;
use Modules\Isp\Modelsubscriber;
use Modules\Isp\Modelsubscription;

class Freeradius
{
    public $subscription;

    public function __construct()
    {
        $gateway = Gateway::where(['type' => 'freeradius', 'published' => true])->first();
        
        if(defined('MYBIZNA_MIGRATION') && MYBIZNA_MIGRATION) {
            return;
         }

        if (!$gateway) {
            throw new \Exception("No Freeradius gateway set.", 1);
        }

        // Erase the connection forcing Laravel to get the default values all over again.
        DB::purge('freeradius');

        // Make sure to use the database name you want to establish a connection to
        Config::set('database.connections.freeradius.driver', 'mysql');
        Config::set('database.connections.freeradius.host', $gateway->ip_address);
        Config::set('database.connections.freeradius.database', $gateway->database);
        Config::set('database.connections.freeradius.username', $gateway->username);
        Config::set('database.connections.freeradius.password', $gateway->password);

        // Reconnect
        DB::reconnect('freeradius');

        // You can ping the database. This will throw an exception in case the database does not exist
        Schema::connection('freeradius')->getConnection()->reconnect();

    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Manage Subscriber

    public function setSubscriber($subscriber)
    {
        $db_freeradius = DB::connection('freeradius');

        $passcheck = $db_freeradius->select('select * from radcheck where username = ? and attribute = ?', [$subscriber->username, 'Cleartext-Password']);

        if (!empty($passcheck)) {
            $db_freeradius->update(
                'update radcheck set value = ? where username = ? and attribute = ?',
                [$subscriber->password, $subscriber->username, 'Cleartext-Password']
            );
        } else {
            $db_freeradius->insert('insert into radcheck (username,attribute,op,value) values (?, ?, ?, ?)', [$subscriber->username, "Cleartext-Password", ":=", $subscriber->password]);
        }

        $subscription_count = Subscription::where('id', $subscriber->id)->count();

        if ($subscription_count) {

            $package = Package::where('slug', 'free')->first();

            if ($subscriber->had_trail) {
                $package = Package::where('slug', 'trail')->first();
            }

            $this->setSubscriberPackage($subscriber->username, $package);
        }

    }

    public function deleteSubscriber($username)
    {
        $db_freeradius = DB::connection('freeradius');
        
        $db_freeradius->delete('delete from radcheck where username = ?', [$username]);
        $db_freeradius->delete('delete from radusergroup where username = ?', [$username]);
    }

    public function setSubscriberPackage($username, $package)
    {
        $db_freeradius = DB::connection('freeradius');

        $speed_type = $package->speed_type[0] ?? null;
        $speed_type = ($speed_type == 'm' || $speed_type == 'g') ? strtoupper($speed_type) : $speed_type;

        $groupname = $this->getGroupName($package->slug);
        $speed = $package->speed . $speed_type;

        $speed_profile = $groupname . '_Profile';

        $profilecheck = $db_freeradius->select('select * from radcheck where username = ? and attribute = ?', [$username, 'User-Profile']);
        if (!empty($profilecheck)) {
            $db_freeradius->update(
                'update radcheck set value = ? where username = ? and attribute = ?',
                [$speed_profile, $username, 'User-Profile']
            );
        } else {
            $db_freeradius->insert('insert into radcheck (username,attribute,op,value) values (?, ?, ?, ?)', [$username, "User-Profile", ":=", $speed_profile]);
        }

        $profilecheck = $db_freeradius->select('select * from radusergroup where username = ? and groupname = ?',
            [$username, $groupname]);
        if (!empty($profilecheck)) {
            $db_freeradius->update(
                'update radusergroup set priority = ? where username = ? and groupname = ?',
                [10, $username, $groupname]
            );
        } else {
            $db_freeradius->insert('insert into radusergroup (username,groupname,priority) values (?, ?, ?)',
                [$username, $groupname, 10]);
        }
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Manage Subscription

    public function setSubscription($subscription)
    {
        $db_freeradius = DB::connection('freeradius');

        $subscriber = Subscriber::where('id', $subscription->subscriber_id)->first();
        $package = Package::where('id', $subscription->package_id)->first();

        $this->setSubscriberPackage($subscriber->username, $package);
    }

    public function deleteSubscription($username)
    {
        $db_freeradius = DB::connection('freeradius');
        
        $db_freeradius->delete('delete from radusergroup where username = ?', [$username]);
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Manage Package
    public function setPackages()
    {
        $packages = DB::table('isp_package AS p')
            ->select('p.*', 'b.title as package_title', 'b.duration_type', 'b.duration')
            ->leftJoin('isp_billing_cycle AS b', 'b.id', '=', 'p.billing_cycle_id')
            ->where(['p.published' => true])
            ->get();

        foreach ($packages as $key => $package) {
            $this->setPackage($package);
        }
    }

    public function setPackage($package)
    {
        $db_freeradius = DB::connection('freeradius');

        $speed_type = $package->speed_type[0] ?? null;
        $speed_type = ($speed_type == 'm' || $speed_type == 'g') ? strtoupper($speed_type) : $speed_type;

        $groupname = $this->getGroupName($package->slug);
        $speed = $package->speed . $speed_type;
        $double_speed = ($package->speed * 2) . $speed_type;

        $microtik_limit = '' . $speed . '/' . $speed . ' ' . $double_speed . '/' . $double_speed . ' ' . $speed . '/' . $speed . ' 40/40';
       
        $speed_pool = $package->pool;
        $speed_profile = $groupname . '_Profile';

        $checker = $db_freeradius->select('select * from radgroupcheck where groupname = ? and attribute = ?',
            [$groupname, 'Framed-Protocol']);
        if (!empty($checker)) {
            $db_freeradius->update(
                'update radgroupcheck set value = ? where groupname = ? and attribute = ?',
                ['PPP', $groupname, 'Framed-Protocol']
            );
        } else {
            $db_freeradius->insert('insert into radgroupcheck (groupname,attribute,op,value) values (?, ?, ?, ?)',
                [$groupname, "Framed-Protocol", "==", 'PPP']);
        }

        $checker = $db_freeradius->select('select * from radgroupreply where groupname = ? and attribute = ?',
            [$groupname, 'Framed-Pool']);
        if (!empty($checker)) {
            $db_freeradius->update(
                'update radgroupreply set value = ? where groupname = ? and attribute = ?',
                [$speed_pool, $groupname, 'Framed-Pool']
            );
        } else {
            $db_freeradius->insert('insert into radgroupreply (groupname,attribute,op,value) values (?, ?, ?, ?)',
                [$groupname, "Framed-Pool", "=", $speed_pool]);
        }

        $checker = $db_freeradius->select('select * from radgroupreply where groupname = ? and attribute = ?',
            [$groupname, 'Mikrotik-Rate-Limit']);
        if (!empty($checker)) {
            $db_freeradius->update(
                'update radgroupreply set value = ? where groupname = ? and attribute = ?',
                [$microtik_limit, $groupname, 'Mikrotik-Rate-Limit']
            );
        } else {
            $db_freeradius->insert('insert into radgroupreply (groupname,attribute,op,value) values (?, ?, ?, ?)',
                [$groupname, "Mikrotik-Rate-Limit", "=", $microtik_limit]);
        }

    }

    public function deletePackage($package)
    {
        $db_freeradius = DB::connection('freeradius');

        $groupname = $this->getGroupName($package->slug);

        $db_freeradius->delete('delete from radgroupcheck where groupname = ?', [$groupname]);
        $db_freeradius->delete('delete from radgroupreply where groupname = ?', [$groupname]);
    }

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Generic

    public function getGroupName($group_name)
    {

        $group_name = preg_replace('/\s+/', ' ', $group_name);

        $group_name = str_replace(' ', '_', $group_name);

        $group_name = preg_replace('/[^A-Za-z0-9\-\_]/', '', $group_name);

        return strtolower($group_name);
    }
}

/***
 *
 *
 *
echo "insert into radgroupcheck (groupname,attribute,op,value) values ('32k','Framed-Protocol','==','PPP');" | sudo mysql
echo "insert into radgroupcheck (groupname,attribute,op,value) values ('512k','Framed-Protocol','==','PPP');" | sudo mysql
echo "insert into radgroupcheck (groupname,attribute,op,value) values ('1M','Framed-Protocol','==','PPP');" | sudo mysql
echo "insert into radgroupcheck (groupname,attribute,op,value) values ('2M','Framed-Protocol','==','PPP');" | sudo mysql

echo "insert into radgroupreply (groupname,attribute,op,value) values ('32k','Framed-Pool','=','32k_pool');" | sudo mysql
echo "insert into radgroupreply (groupname,attribute,op,value) values ('512k','Framed-Pool','=','512k_pool');" | sudo mysql
echo "insert into radgroupreply (groupname,attribute,op,value) values ('1M','Framed-Pool','=','1M_pool');" | sudo mysql
echo "insert into radgroupreply (groupname,attribute,op,value) values ('2M','Framed-Pool','=','2M_pool');" | sudo mysql

echo "insert into radgroupreply (groupname,attribute,op,value) values ('32k','Mikrotik-Rate-Limit','=','32k/32k 64k/64k 32k/32k 40/40');" | sudo mysql
echo "insert into radgroupreply (groupname,attribute,op,value) values ('512k','Mikrotik-Rate-Limit','=','512k/512k 1M/1M 512k/512k 40/40');" | sudo mysql
echo "insert into radgroupreply (groupname,attribute,op,value) values ('1M','Mikrotik-Rate-Limit','=','1M/1M 2M/2M 1M/1M 40/40');" | sudo mysql
echo "insert into radgroupreply (groupname,attribute,op,value) values ('2M','Mikrotik-Rate-Limit','=','2M/2M 4M/4M 2M/2M 40/40');" | sudo mysql

insert into radusergroup (username,groupname,priority) values ("32k_Profile","32k",10);
insert into radusergroup (username,groupname,priority) values ("512k_Profile","512k",10);
insert into radusergroup (username,groupname,priority) values ("1M_Profile","1M",10);
insert into radusergroup (username,groupname,priority) values ("2M_Profile","2M",10);

 */
