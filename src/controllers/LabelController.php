<?php

include("src/models/Label.php");

class LabelController {
    
    private $requestQuery;
    private $label;

    public function __construct(){
        $this->requestQuery = $_SERVER['QUERY_STRING'];
        $this->label = new Label();
    }



    public function GET($id = NULL) {
        if($id =! NULL){
            $this->label->setId($id);
        }
        
        var_dump($id);die;
        return $this->label->getLabels();
    }

    public function POST() {
    }

    public function PUT() {
    }

    public function DELETE() {
    }
}