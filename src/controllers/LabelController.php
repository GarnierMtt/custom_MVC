<?php

include("src/models/Label.php");

class LabelController {
    
    private $requestQuery;
    private $label;

    public function __construct(){
        $this->label = new Label(); // initialise le model de l'objet

                            // stock paramètre de la requète
        $this->requestQuery = $_SERVER['QUERY_STRING'];

                            // asigne l'id de l'objet si définit
        $url = explode('/', $_SERVER['PATH_INFO']);
        array_shift($url);
        array_shift($url);
        if(end($url) == ""){
            array_pop($url);
        }
        if(isset($url[0])){
            $this->label->setId($url[0]);
        }
    }


    public function GET() {
        return $this->label->getLabels();
    }

    public function POST() {
    }

    public function PUT() {
    }

    public function DELETE() {
    }
}