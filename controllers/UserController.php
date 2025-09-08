<?php

function isControllerMethod(string $methode){
    return in_array($methode, ["index"]);
}

Class UserController{
    function index($params = []){
        echo 'toto';
    }
}

