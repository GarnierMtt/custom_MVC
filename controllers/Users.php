<?php

function isControllerMethod(string $methode){
    return in_array($methode, ["index"]);
}

Class Users{
    function index($params = []){
        echo 'toto';
    }
}

