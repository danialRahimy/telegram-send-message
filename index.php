<?php

require_once "assets/require.php";

$functions = new Functions();
$configClass = new JsonClass(CACHE_DIR . "/configs.json");

$formValues = array();

$formData = array("channels", "robotId", "robotApiKey", "messages");
$formData = $functions->managePostRequest($formData);
if ($formData){

    $save = $formData;
    $formValuesChannel = array();
    foreach ($formData["channels"] as $datum){
        if (!empty($datum))
            $formValuesChannel[] = $datum;
    }
    $save["channels"] = $formValuesChannel;
    $configClass->putData($save);

    // Send Message Now For Test
    $functions->curl_get_contents($_SERVER["HTTP_REFERER"] . "assets/job/sendMessage.php");

    $configs = $save;
}else{
    $configs = $configClass->getData();
}

if (!empty($configs)){
    $formValues = $configs;
}

require_once TEMPLATE_DIR . "/action/home.php";
