<?php

namespace Modules\Isp\Entities\Data;

use Modules\Base\Classes\Datasetter;

class LanguageTranslation
{
    public $ordering = 5;

    public function data(Datasetter $datasetter)
    {
        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-buyform-phone-label",
            "language" => "EN-US",
            "phrase" => "Please Enter Your Phone",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-buyform-button-label",
            "language" => "EN-US",
            "phrase" => "Proceed",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-canceled    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-canceled-title",
            "language" => "EN-US",
            "phrase" => "Payment was Canceled.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-canceled-instructions",
            "language" => "EN-US",
            "phrase" => "Click the button <b>Profile</b> to try again.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-canceled-button",
            "language" => "EN-US",
            "phrase" => "Profile",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-dashboard    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-current-active-package",
            "language" => "EN-US",
            "phrase" => "CURRENT ACTIVE PACKAGE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-current-active-package-package",
            "language" => "EN-US",
            "phrase" => "PACKAGE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-current-active-package-limits",
            "language" => "EN-US",
            "phrase" => "LIMITS",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-current-active-package-expire",
            "language" => "EN-US",
            "phrase" => "EXPIRE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-renew",
            "language" => "EN-US",
            "phrase" => "Renew",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-no-package",
            "language" => "EN-US",
            "phrase" => "No Package",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-no-package-instruction",
            "language" => "EN-US",
            "phrase" => "Please Select Preferred package listed below.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-active-package",
            "language" => "EN-US",
            "phrase" => "OTHER ACTIVE PACKAGE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-active-package-name",
            "language" => "EN-US",
            "phrase" => "NAME",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-active-package-limits",
            "language" => "EN-US",
            "phrase" => "LIMITS",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-active-package-expire",
            "language" => "EN-US",
            "phrase" => "EXPIRE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-logged-in-title",
            "language" => "EN-US",
            "phrase" => "Your username is shown below;",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-logged-in-instruction",
            "language" => "EN-US",
            "phrase" => "Please save it incase you would like to login or share with another device.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-login-title",
            "language" => "EN-US",
            "phrase" => "Access Pro account.",
        ]);
        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-login-instruction",
            "language" => "EN-US",
            "phrase" => "We couldn't autoassociate your account with any user. Please click login button below.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-login-button",
            "language" => "EN-US",
            "phrase" => "LOGIN",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-account-title",
            "language" => "EN-US",
            "phrase" => "Welcome to Our Network.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-account-instruction",
            "language" => "EN-US",
            "phrase" => "Buy your Internet bundle below.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-account-balance",
            "language" => "EN-US",
            "phrase" => "BALANCE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-account-unpaid",
            "language" => "EN-US",
            "phrase" => "UNPAID INVOICES",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-buy-button",
            "language" => "EN-US",
            "phrase" => "BUY",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-nofeatured-title",
            "language" => "EN-US",
            "phrase" => "No Featured",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-nofeatured-instruction",
            "language" => "EN-US",
            "phrase" => "There is no featured package set.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-quick-links",
            "language" => "EN-US",
            "phrase" => "Quick Links",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-quick-links-google",
            "language" => "EN-US",
            "phrase" => "Google",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-quick-links-youtube",
            "language" => "EN-US",
            "phrase" => "Youtube",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-quick-links-facebook",
            "language" => "EN-US",
            "phrase" => "Facebook",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-quick-links-twitter",
            "language" => "EN-US",
            "phrase" => "Twitter",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-purchase-request",
            "language" => "EN-US",
            "phrase" => "Past Purchase Request",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-purchase-request-date",
            "language" => "EN-US",
            "phrase" => "Date",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-purchase-request-status",
            "language" => "EN-US",
            "phrase" => "Status",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-purchase-request-cancel",
            "language" => "EN-US",
            "phrase" => "Cancel",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-purchase-request-payment",
            "language" => "EN-US",
            "phrase" => "Payment",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-package-title",
            "language" => "EN-US",
            "phrase" => "Package",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-package-package",
            "language" => "EN-US",
            "phrase" => "Package",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-package-speed",
            "language" => "EN-US",
            "phrase" => "Speed",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-dashboard-package-button",
            "language" => "EN-US",
            "phrase" => "Buy",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-error    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-error-title",
            "language" => "EN-US",
            "phrase" => "ERROR",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-error-instruction",
            "language" => "EN-US",
            "phrase" => "Click the button <b>Profile</b> to try again.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-error-button",
            "language" => "EN-US",
            "phrase" => "Profile",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-login    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-login-title",
            "language" => "EN-US",
            "phrase" => "Login Form",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-login-username",
            "language" => "EN-US",
            "phrase" => "Username",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-login-phone",
            "language" => "EN-US",
            "phrase" => "Phone",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-login-button",
            "language" => "EN-US",
            "phrase" => "LOGIN",
        ]);

        // xxxxxxxxxxxxxxxx  isp-access-mikrotik-login    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-mikrotik-login-title",
            "language" => "EN-US",
            "phrase" => "LOGGING IN",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-mikrotik-login-wait",
            "language" => "EN-US",
            "phrase" => "Please Wait...",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-mikrotik-login-button",
            "language" => "EN-US",
            "phrase" => "Access Internet",
        ]);

        // xxxxxxxxxxxxxxxx  isp-access-register   xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-title",
            "language" => "EN-US",
            "phrase" => "REGISTER",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-name",
            "language" => "EN-US",
            "phrase" => "Name",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-username",
            "language" => "EN-US",
            "phrase" => "Username",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-password",
            "language" => "EN-US",
            "phrase" => "Password",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-password-label",
            "language" => "EN-US",
            "phrase" => "Please choose a password.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-phone",
            "language" => "EN-US",
            "phrase" => "Phone",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-email",
            "language" => "EN-US",
            "phrase" => "Email",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-button",
            "language" => "EN-US",
            "phrase" => "Register",
        ]);

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-access-register-back-button",
            "language" => "EN-US",
            "phrase" => "Back to Login",
        ]);

                // xxxxxxxxxxxxxxxx  isp-access-thankyou   xxxxxxxxxxxxxxxxxx

                $datasetter->add_data('core', 'language_translation', 'code', [
                    "slug" => "isp-access-thankyou-title",
                    "language" => "EN-US",
                    "phrase" => "Thank You for your Payment",
                ]);
   
                $datasetter->add_data('core', 'language_translation', 'code', [
                    "slug" => "isp-access-thankyou-instruction",
                    "language" => "EN-US",
                    "phrase" => "Click the button <b>Access Internet</b> to proceed to Internet.",
                ]);   

                $datasetter->add_data('core', 'language_translation', 'code', [
                    "slug" => "isp-access-thankyou-button",
                    "language" => "EN-US",
                    "phrase" => " Access Internet",
                ]);  

        $datasetter->add_data('core', 'language_translation', 'code', [
            "slug" => "isp-copy-right",
            "language" => "EN-US",
            "phrase" => "All rights reserved.",
        ]);

    }
}
