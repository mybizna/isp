<?php

$this->add_module_info("isp", [
    'title' => 'Isp',
    'description' => 'Isp',
    'icon' => 'fas fa-network-wired',
    'path' => 'isp.admin.subscriber',
    'class_str' => 'text-secondary border-secondary'
]);

$this->add_menu("isp", "subscriber", "Subscriber", "/isp/admin/subscriber", "fas fa-cogs", 5);
$this->add_menu("isp", "subscription", "Subscription", "/isp/admin/subscription", "fas fa-cogs", 5);
$this->add_menu("isp", "payment", "Payment", "/isp/admin/payment", "fas fa-cogs", 5);
$this->add_menu("isp", "package", "Package", "/isp/admin/package", "fas fa-cogs", 5);
$this->add_menu("isp", "setting", "Setting", "/isp/admin/gateway", "fas fa-cogs", 5);

$this->add_submenu("isp", "setting", "Gateway", "/isp/admin/gateway", 5);
$this->add_submenu("isp", "setting", "Billing Cylce", "/isp/admin/billing_cycle", 5);
$this->add_submenu("isp", "setting", "Package Charges", "/isp/admin/package_charge", 5);
