<?php

/**
 * Class JsonClass
 *
 * date created: 2020/26/04
 * date update: 2020/27/04
 * author: Danial Rahimi
 * email: daniel_rahimi@outlook.com
 * github page: https://github.com/danialRahimy
 * repository page on github: https://github.com/danialRahimy/php-class
 */


class JsonClass
{

    private $fileAddress = "";

    /**
     * JsonClass constructor.
     * @param $fileAddress
     */
    public function __construct($fileAddress)
    {
        $this->fileAddress = $fileAddress;
    }

    /**
     * @return mixed
     */
    public function getData (){

        if (file_exists($this->fileAddress)){
            return json_decode(file_get_contents($this->fileAddress),JSON_UNESCAPED_UNICODE | JSON_OBJECT_AS_ARRAY);
        }

        return "";

    }

    /**
     * @param $data
     */
    public function putData ($data){

        file_put_contents($this->fileAddress,json_encode($data,JSON_UNESCAPED_UNICODE | JSON_OBJECT_AS_ARRAY | JSON_PRETTY_PRINT));

    }
}