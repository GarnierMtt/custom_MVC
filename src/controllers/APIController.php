<?php

class APIController{
    
    private $requestMethod;
    private $requestObject;
    

    public function __construct(){ //récupere la méthod et le nom du controller
        $url = explode('/', $_SERVER['PATH_INFO']);

        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->requestObject = ucfirst(rtrim($url[1], "s")) . "Controller";
    }


    public function processRequest(){
                            // vérifie que le controller existe
        if(file_exists("src/controllers/" . $this->requestObject . ".php")){
            include("src/controllers/" . $this->requestObject . ".php");
            $modelController = new $this->requestObject;

                            // vérfie que la méthod existe
            if(in_array($this->requestMethod, ['GET','POST','PUT','DELETE'])) {
                                            //appel la method du controller
                $result = call_user_func([$modelController, $this->requestMethod]);
                            // réponse
                $response['status_code_header'] = 'HTTP/1.1 200 OK';
                $response['body'] = json_encode($result);

                                            // réponse en cas d'echeque
            }else{
                $response = $this->notFoundResponse("bad request method");
            }
        }else{
            $response = $this->notFoundResponse("entity unknown");
        }

                            // envoir la réponse
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }


    private function notFoundResponse($msg = NULL){ // réponse echeque
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found - ' . $msg;
        $response['body'] = NULL;
        return $response;
    }
}