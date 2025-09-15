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
        $url[1] = ucfirst(rtrim($url[1], "s"));

        $this->requestMethod = strtoupper($url[0]);
        array_shift($url);
        $this->requestPath = $url;
        $this->requestQuery = $_SERVER['QUERY_STRING'];
    }


    public function processRequest(){
        if(file_exists("src/models/" . $this->requestPath[0] . ".php")){
            include("src/models/" . $this->requestPath[0] . ".php");
            $class = new $this->requestPath[0];
            
            if(in_array($this->requestMethod, ['GET','POST','PUT','DELETE'])) {
                $result = call_user_func([$class, $this->requestMethod]);

                $response['status_code_header'] = 'HTTP/1.1 200 OK';
                $response['body'] = json_encode($result);
            }else{
                $response = $this->notFoundResponse();
            }

        }else{
            $response = $this->notFoundResponse();
        }

        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }


    private function notFoundResponse(){
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
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