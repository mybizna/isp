<?php

namespace Modules\Isp\Entities\Data;

use Modules\Base\Classes\Datasetter;

class LanguageTranslation
{
    public $ordering = 5;

    public function data(Datasetter $datasetter)
    {
        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-buyform-phone-label",
            "language" => "en-us",
            "phrase" => "Please Enter Your Phone",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-buyform-button-label",
            "language" => "en-us",
            "phrase" => "Proceed",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-canceled    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-canceled-title",
            "language" => "en-us",
            "phrase" => "Payment was Canceled.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-canceled-instructions",
            "language" => "en-us",
            "phrase" => "Click the button <b>Profile</b> to try again.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-canceled-button",
            "language" => "en-us",
            "phrase" => "Profile",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-dashboard    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-current-active-package",
            "language" => "en-us",
            "phrase" => "CURRENT ACTIVE PACKAGE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-current-active-package-package",
            "language" => "en-us",
            "phrase" => "PACKAGE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-current-active-package-limits",
            "language" => "en-us",
            "phrase" => "LIMITS",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-current-active-package-expire",
            "language" => "en-us",
            "phrase" => "EXPIRE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-renew",
            "language" => "en-us",
            "phrase" => "Renew",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-no-package",
            "language" => "en-us",
            "phrase" => "No Package",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-no-package-instruction",
            "language" => "en-us",
            "phrase" => "Please Select Preferred package listed below.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-active-package",
            "language" => "en-us",
            "phrase" => "OTHER ACTIVE PACKAGE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-active-package-name",
            "language" => "en-us",
            "phrase" => "NAME",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-active-package-limits",
            "language" => "en-us",
            "phrase" => "LIMITS",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-active-package-expire",
            "language" => "en-us",
            "phrase" => "EXPIRE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-logged-in-title",
            "language" => "en-us",
            "phrase" => "Your username is shown below;",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-logged-in-instruction",
            "language" => "en-us",
            "phrase" => "Please save it incase you would like to login or share with another device.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-login-title",
            "language" => "en-us",
            "phrase" => "Access Pro account.",
        ]);
        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-login-instruction",
            "language" => "en-us",
            "phrase" => "We couldn't autoassociate your account with any user. Please click login button below.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-login-button",
            "language" => "en-us",
            "phrase" => "LOGIN",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-account-title",
            "language" => "en-us",
            "phrase" => "Welcome to Our Network.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-account-instruction",
            "language" => "en-us",
            "phrase" => "Buy your Internet bundle below.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-account-balance",
            "language" => "en-us",
            "phrase" => "BALANCE",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-account-unpaid",
            "language" => "en-us",
            "phrase" => "UNPAID INVOICES",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-buy-button",
            "language" => "en-us",
            "phrase" => "BUY",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-nofeatured-title",
            "language" => "en-us",
            "phrase" => "No Featured",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-nofeatured-instruction",
            "language" => "en-us",
            "phrase" => "There is no featured package set.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-quick-links",
            "language" => "en-us",
            "phrase" => "Quick Links",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-quick-links-google",
            "language" => "en-us",
            "phrase" => "Google",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-quick-links-youtube",
            "language" => "en-us",
            "phrase" => "Youtube",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-quick-links-facebook",
            "language" => "en-us",
            "phrase" => "Facebook",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-quick-links-twitter",
            "language" => "en-us",
            "phrase" => "Twitter",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-purchase-request",
            "language" => "en-us",
            "phrase" => "Past Purchase Request",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-purchase-request-date",
            "language" => "en-us",
            "phrase" => "Date",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-purchase-request-status",
            "language" => "en-us",
            "phrase" => "Status",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-purchase-request-cancel",
            "language" => "en-us",
            "phrase" => "Cancel",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-purchase-request-payment",
            "language" => "en-us",
            "phrase" => "Payment",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-package-title",
            "language" => "en-us",
            "phrase" => "Package",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-package-package",
            "language" => "en-us",
            "phrase" => "Package",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-package-speed",
            "language" => "en-us",
            "phrase" => "Speed",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-dashboard-package-button",
            "language" => "en-us",
            "phrase" => "Buy",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-error    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-error-title",
            "language" => "en-us",
            "phrase" => "ERROR",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-error-instruction",
            "language" => "en-us",
            "phrase" => "Click the button <b>Profile</b> to try again.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-error-button",
            "language" => "en-us",
            "phrase" => "Profile",
        ]);

        // xxxxxxxxxxxxxxxx isp-access-login    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-login-title",
            "language" => "en-us",
            "phrase" => "Login Form",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-login-username",
            "language" => "en-us",
            "phrase" => "Username",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-login-phone",
            "language" => "en-us",
            "phrase" => "Phone",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-login-button",
            "language" => "en-us",
            "phrase" => "LOGIN",
        ]);

        // xxxxxxxxxxxxxxxx  isp-access-mikrotik-login    xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-mikrotik-login-title",
            "language" => "en-us",
            "phrase" => "LOGGING IN",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-mikrotik-login-wait",
            "language" => "en-us",
            "phrase" => "Please Wait...",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-mikrotik-login-button",
            "language" => "en-us",
            "phrase" => "Access Internet",
        ]);

        // xxxxxxxxxxxxxxxx  isp-access-register   xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-title",
            "language" => "en-us",
            "phrase" => "REGISTER",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-name",
            "language" => "en-us",
            "phrase" => "Name",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-username",
            "language" => "en-us",
            "phrase" => "Username",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-password",
            "language" => "en-us",
            "phrase" => "Password",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-password-label",
            "language" => "en-us",
            "phrase" => "Please choose a password.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-phone",
            "language" => "en-us",
            "phrase" => "Phone",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-email",
            "language" => "en-us",
            "phrase" => "Email",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-button",
            "language" => "en-us",
            "phrase" => "Register",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-register-back-button",
            "language" => "en-us",
            "phrase" => "Back to Login",
        ]);

        // xxxxxxxxxxxxxxxx  isp-access-thankyou   xxxxxxxxxxxxxxxxxx

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-thankyou-title",
            "language" => "en-us",
            "phrase" => "Thank You for your Payment",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-thankyou-instruction",
            "language" => "en-us",
            "phrase" => "Click the button <b>Access Internet</b> to proceed to Internet.",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-access-thankyou-button",
            "language" => "en-us",
            "phrase" => " Access Internet",
        ]);

        $datasetter->add_data('core', 'language_translation', 'slug', [
            "slug" => "isp-copy-right",
            "language" => "en-us",
            "phrase" => "All rights reserved.",
        ]);

    }
}
