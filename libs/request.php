<?php

class Request{
    public $body;
    public $params;
    public $query;

    public function __construct(){
        try{
            $this->body = json_decode(file_get_contents('php//input'),true);

        }catch (Exception $e){
            $this->body = null;
        }
        $this->query = (object) $_GET;
    }

}