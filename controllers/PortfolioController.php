<?php

include("View.php");
include("models/Realisation.php");
include("models/Label.php");


function isControllerMethod(string $methode){
    return in_array($methode, ["index"]);
}

class PortfolioController{
    function index($params = []){
        
        $labels = new Label();
        $realisations = new Realisation();
        
        $data = [];
        $datanode = new DOMDocument();

        foreach($labels->get_all() as $label){
            $data = array(true, $label["name"]);
            foreach($realisations->get_from_label($label["id"]) as $realisation){
                $data[] = array(false, $realisation);
            }
        }
        /*  DATA[] STRUCTURE
            array(
                *bool*, // is label ? 
                ***, //if label -> *string* else -> *array*
            )
        */


        //var_dump($data);die;

        $view = new View();
        $view->loadView("portfolio/index.html", $data);

    }
}