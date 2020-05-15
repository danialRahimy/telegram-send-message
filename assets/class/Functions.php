<?php

class Functions
{

    public function defaultFormValue($value, $array)
    {
        $explode = explode(":",$value);

        if (count($explode) > 1){

            $key = $explode[0];
            $index = intval($explode[1]);

            if (array_key_exists($key, $array) and count($array[$key]) > $index ) {
                return $array[$key][$index];
            }
        }else{
            if (array_key_exists($value, $array)) {
                return $array[$value];
            }
        }

        return "";
    }

    public function managePostRequest ($values)
    {

        $outPut = false;

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $list = array();

            foreach ($values as $value){
                if (isset($_POST[$value]))
                    $list[$value] = $_POST[$value];
            }

            $outPut = $list;
        }

        return $outPut;
    }

    public function curl_get_contents($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}