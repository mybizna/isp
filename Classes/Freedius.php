<?php

// Erase the connection forcing Laravel to get the default values all over again.
\Illuminate\Support\Facades\DB::purge('freeradius');

// Make sure to use the database name you want to establish a connection to
\Illuminate\Support\Facades\Config::set('database.connections.freeradius.host', 'host');
\Illuminate\Support\Facades\Config::set('database.connections.freeradius.database', 'database');
\Illuminate\Support\Facades\Config::set('database.connections.freeradius.username', 'username');
\Illuminate\Support\Facades\Config::set('database.connections.freeradius.password', 'password');

// Reconnect
\Illuminate\Support\Facades\DB::reconnect('freeradius');

// You can ping the database. This will throw an exception in case the database does not exist
\Illuminate\Support\Facades\Schema::connection('freeradius')->getConnection()->reconnect();