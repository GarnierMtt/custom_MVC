<?php

class APIController{
    
    private $requestMethod;
    private $requestPath;
    

    public function __construct(){
        $url = explode('/', $_SERVER['PATH_INFO']);
        array_shift($url);
        if(end($url) == ""){
            array_pop($url);
        }
        $url[0] = ucfirst(rtrim($url[0], "s")) . "Controller";

        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->requestPath = $url;
    }


    public function processRequest(){
        if(file_exists("src/controllers/" . $this->requestPath[0] . ".php")){
            include("src/controllers/" . $this->requestPath[0] . ".php");
            $modelController = new $this->requestPath[0];
            
            if(in_array($this->requestMethod, ['GET','POST','PUT','DELETE'])) {
                if(isset($this->requestPath[1]) == FALSE){
                    
                    $this->requestPath[1] = NULL;
                }
        var_dump($this->requestPath[1]);die;
                $result = call_user_func([$modelController, $this->requestMethod],$this->requestPath[1]);

                $response['status_code_header'] = 'HTTP/1.1 200 OK';
                $response['body'] = json_encode($result);
            }else{
                $response = $this->notFoundResponse("bad request method");
            }

        }else{
            $response = $this->notFoundResponse("entity unknown");
        }

        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }


    private function notFoundResponse($msg = NULL){
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found - ' . $msg;
        $response['body'] = NULL;
        return $response;
    }
}