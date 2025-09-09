<?php

class APIController{
    
    private $requestMethod;
    private $requestPath;
    private $requestQuery;

    public function __construct(){
        $url = explode('/', $_SERVER['PATH_INFO']);
        array_shift($url);
        if(end($url) == ""){
            array_pop($url);
        }
        $url[1] = rtrim($url[1], "s");

        $this->requestMethod = strtoupper($url[0]);
        array_shift($url);
        $this->requestPath = $url;
        $this->requestQuery = $_SERVER['PHP_URL_QUERY'];
    }

    public function processRequest(){
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->userId) {
                    $response = $this->getUser($this->userId);
                } else {
                    $response = $this->getAllUsers();
                };
                break;
            case 'POST':
                $response = $this->createUserFromRequest();
                break;
            case 'PUT':
                $response = $this->updateUserFromRequest($this->userId);
                break;
            case 'DELETE':
                $response = $this->deleteUser($this->userId);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
    }
}








 
        /*
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
          DATA[] STRUCTURE
            array(
                *bool*, // is label ? 
                ***, //if label -> *string* else -> *array*
            )
        


        //var_dump($data);die;

        $view = new View();
        $view->loadView("portfolio/index.html", $data);
        */