<?php

function isControllerMethod(string $methode){
    return in_array($methode, ["index"]);
}

class Portfolio{
    function index($params = []){
        // Create a new DOMDocument
        $doc = new DOMDocument();

        // Load the HTML file
        $doc->loadHTMLFile("views/portfolio/index.php");

        // Create an HTML document and display it
        echo $doc->saveHTML();
        
    }
}