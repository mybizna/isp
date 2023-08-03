<?php

namespace Modules\Isp\Entities\Data;

use DB;
use Modules\Base\Classes\Datasetter;

class LanguageTranslation
{
    /**
     * Set ordering of the Class to be migrated.
     * 
     * @var int
     */
    public $ordering = 5;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {
        $languages = DB::table('core_language')->get();

        foreach ($languages as $key => $language) {
            $language_id = $language->id;

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-buyform-phone-label",
                "language_id" => $language_id,
                "phrase" => "Please Enter Your Phone",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-buyform-button-label",
                "language_id" => $language_id,
                "phrase" => "Proceed",
            ]);

            // xxxxxxxxxxxxxxxx isp-access-canceled    xxxxxxxxxxxxxxxxxx

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-canceled-title",
                "language_id" => $language_id,
                "phrase" => "Payment was Canceled.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-canceled-instructions",
                "language_id" => $language_id,
                "phrase" => "Click the button <b>Profile</b> to try again.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-canceled-button",
                "language_id" => $language_id,
                "phrase" => "Profile",
            ]);

            // xxxxxxxxxxxxxxxx isp-access-dashboard    xxxxxxxxxxxxxxxxxx

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-current-active-package",
                "language_id" => $language_id,
                "phrase" => "CURRENT ACTIVE PACKAGE",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-current-active-package-package",
                "language_id" => $language_id,
                "phrase" => "PACKAGE",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-current-active-package-limits",
                "language_id" => $language_id,
                "phrase" => "LIMITS",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-current-active-package-expire",
                "language_id" => $language_id,
                "phrase" => "EXPIRE",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-renew",
                "language_id" => $language_id,
                "phrase" => "Renew",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-no-package",
                "language_id" => $language_id,
                "phrase" => "No Package",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-no-package-instruction",
                "language_id" => $language_id,
                "phrase" => "Please Select Preferred package listed below.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-active-package",
                "language_id" => $language_id,
                "phrase" => "OTHER ACTIVE PACKAGE",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-active-package-name",
                "language_id" => $language_id,
                "phrase" => "NAME",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-active-package-limits",
                "language_id" => $language_id,
                "phrase" => "LIMITS",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-active-package-expire",
                "language_id" => $language_id,
                "phrase" => "EXPIRE",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-logged-in-title",
                "language_id" => $language_id,
                "phrase" => "Your username is shown below;",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-logged-in-instruction",
                "language_id" => $language_id,
                "phrase" => "Please save it incase you would like to login or share with another device.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-login-title",
                "language_id" => $language_id,
                "phrase" => "Access Pro account.",
            ]);
            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-login-instruction",
                "language_id" => $language_id,
                "phrase" => "We couldn't autoassociate your account with any user. Please click login button below.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-login-button",
                "language_id" => $language_id,
                "phrase" => "LOGIN",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-account-title",
                "language_id" => $language_id,
                "phrase" => "Welcome to Our Network.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-account-instruction",
                "language_id" => $language_id,
                "phrase" => "Buy your Internet bundle below.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-account-balance",
                "language_id" => $language_id,
                "phrase" => "BALANCE",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-account-unpaid",
                "language_id" => $language_id,
                "phrase" => "UNPAID INVOICES",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-buy-button",
                "language_id" => $language_id,
                "phrase" => "BUY",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-nofeatured-title",
                "language_id" => $language_id,
                "phrase" => "No Featured",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-nofeatured-instruction",
                "language_id" => $language_id,
                "phrase" => "There is no featured package set.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-quick-links",
                "language_id" => $language_id,
                "phrase" => "Quick Links",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-quick-links-google",
                "language_id" => $language_id,
                "phrase" => "Google",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-quick-links-youtube",
                "language_id" => $language_id,
                "phrase" => "Youtube",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-quick-links-facebook",
                "language_id" => $language_id,
                "phrase" => "Facebook",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-quick-links-twitter",
                "language_id" => $language_id,
                "phrase" => "Twitter",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-purchase-request",
                "language_id" => $language_id,
                "phrase" => "Past Purchase Request",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-purchase-request-date",
                "language_id" => $language_id,
                "phrase" => "Date",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-purchase-request-status",
                "language_id" => $language_id,
                "phrase" => "Status",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-purchase-request-cancel",
                "language_id" => $language_id,
                "phrase" => "Cancel",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-purchase-request-payment",
                "language_id" => $language_id,
                "phrase" => "Payment",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-package-title",
                "language_id" => $language_id,
                "phrase" => "Package",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-package-package",
                "language_id" => $language_id,
                "phrase" => "Package",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-package-speed",
                "language_id" => $language_id,
                "phrase" => "Speed",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-dashboard-package-button",
                "language_id" => $language_id,
                "phrase" => "Buy",
            ]);

            // xxxxxxxxxxxxxxxx isp-access-error    xxxxxxxxxxxxxxxxxx

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-error-title",
                "language_id" => $language_id,
                "phrase" => "ERROR",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-error-instruction",
                "language_id" => $language_id,
                "phrase" => "Click the button <b>Profile</b> to try again.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-error-button",
                "language_id" => $language_id,
                "phrase" => "Profile",
            ]);

            // xxxxxxxxxxxxxxxx isp-access-login    xxxxxxxxxxxxxxxxxx

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-login-title",
                "language_id" => $language_id,
                "phrase" => "Login Form",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-login-username",
                "language_id" => $language_id,
                "phrase" => "Username",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-login-phone",
                "language_id" => $language_id,
                "phrase" => "Phone",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-login-button",
                "language_id" => $language_id,
                "phrase" => "LOGIN",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-login-password",
                "language_id" => $language_id,
                "phrase" => "Password",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-login-passcode",
                "language_id" => $language_id,
                "phrase" => "Passcode",
            ]);

            // xxxxxxxxxxxxxxxx  isp-access-mikrotik-login    xxxxxxxxxxxxxxxxxx

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-mikrotik-login-title",
                "language_id" => $language_id,
                "phrase" => "LOGGING IN",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-mikrotik-login-wait",
                "language_id" => $language_id,
                "phrase" => "Please Wait for the system to open internet access automatically or Click the button below.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-mikrotik-login-button",
                "language_id" => $language_id,
                "phrase" => "Access Internet",
            ]);

            // xxxxxxxxxxxxxxxx  isp-access-register   xxxxxxxxxxxxxxxxxx

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-title",
                "language_id" => $language_id,
                "phrase" => "REGISTER",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-name",
                "language_id" => $language_id,
                "phrase" => "Name",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-username",
                "language_id" => $language_id,
                "phrase" => "Username",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-password",
                "language_id" => $language_id,
                "phrase" => "Password",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-password-label",
                "language_id" => $language_id,
                "phrase" => "Please choose a password.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-phone",
                "language_id" => $language_id,
                "phrase" => "Phone",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-email",
                "language_id" => $language_id,
                "phrase" => "Email",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-button",
                "language_id" => $language_id,
                "phrase" => "Register",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-register-back-button",
                "language_id" => $language_id,
                "phrase" => "Back to Login",
            ]);

            // xxxxxxxxxxxxxxxx  isp-access-thankyou   xxxxxxxxxxxxxxxxxx

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-thankyou-title",
                "language_id" => $language_id,
                "phrase" => "Thank You for your Payment",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-thankyou-instruction",
                "language_id" => $language_id,
                "phrase" => "Click the button <b>Access Internet</b> to proceed to Internet.",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-access-thankyou-button",
                "language_id" => $language_id,
                "phrase" => " Access Internet",
            ]);

            $datasetter->add_data('core', 'language_translation', ['slug', 'language_id'], [
                "slug" => "isp-copy-right",
                "language_id" => $language_id,
                "phrase" => "All rights reserved.",
            ]);

        }
    }
}
