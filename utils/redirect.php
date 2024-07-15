<?php


class Redirect{

    public function __construct($url){
        header("Location: $url");
    }
}



