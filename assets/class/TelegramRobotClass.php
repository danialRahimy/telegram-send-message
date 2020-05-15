<?php

/**
 * Class TelegramRobotClass
 *
 * date created: 2020/10/04
 * author: Danial Rahimi
 * email: daniel_rahimi@outlook.com
 * github page: https://github.com/danialRahimy
 * repository page on github: https://github.com/danialRahimy/php-class
 */


class TelegramRobotClass
{

    private $api;

    /**
     * TelegramRobotClass constructor.
     * @param $api
     */
    public function __construct($api)
    {
        $this->api = $api;
    }

    /**
     * @return false|string
     * use this method to get messages that send to your bot or for example the channel that the bot member it
     */
    public function getUpdates()
    {
        return json_decode($this->curl_get_contents("https://api.telegram.org/bot{$this->api}/getUpdates"),true);
    }

    /**
     * @param array $messages
     * @param string $user without @
     */
    public function sendTextMassage($messages, $user)
    {

        for ($i = 0 ; $i < count($messages) ; $i++){
            $url = "https://api.telegram.org/bot" . $this->api . "/sendMessage?chat_id=" . $user . "&text=" . urlencode($messages[$i]) . "&parse_mode=html";
            file_get_contents($url);
        }

    }

    /**
     * @param string $url
     * @return bool|string
     */
    private function curl_get_contents($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

}