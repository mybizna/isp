<?php

$this->add_module_info("account", [
    'title' => 'Accounting',
    'description' => 'Accounting',
    'icon' => 'fas fa-funnel-dollar',
    'class_str' => 'text-primary border-primary'
]);

//$this->add_setting_category("module", "key", "title", "position", "params");
$this->add_setting_category("account", "ledger", "Ledger", 1, ['icon' => "fas fa-cogs"]);

//$this->add_setting("module", "key", "title","path", "position");
$this->add_setting("account", "ledger", "Sales Default Ledger", 5, [
    "name" => "title",
    "type" => "text",
    "placeholder" => "Enter Title",
    "value" => "My Title"
]);

$this->add_setting("account", "ledger", "Default Description", 5, [
    "name" =>  "description",
    "type" =>  "textarea",
    "placeholder" =>  "Enter Description",
    "value" =>  "Your Awesome Description is very Good."
]);
