<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/require.php";

$configsClass = new JsonClass(CACHE_DIR . "/configs.json");
$configs = $configsClass->getData();

if (is_array($configs) and count($configs) > 0){

    $telegram = new TelegramRobotClass($configs["robotApiKey"]);
    $channels = $configs["channels"];
    $messages = $configs["messages"];

    foreach ($channels as $channel){
        if (!empty($channel))
            $telegram->sendTextMassage($messages,$channel);
    }

}
