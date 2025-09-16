<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("src/controllers/APIController.php");

header("Access-Control-Allow-Origin: *");

/*#############################################################################################################
*                                           fètch data
* #############################################################################################################*/

    $controller = new APIController();

    //var_dump($_SERVER['REQUEST_METHOD']);die;
    
/*#############################################################################################################
*                                           data définitions
* #############################################################################################################
*    url : http://163.172.44.107/matteo/custom_MVC/ [0]       *[1]
*                                            {path}< ^model(s)  ^id >  ?{query}  #{fragment}              */


/*#############################################################################################################
*                                                  routting
* #############################################################################################################*/

    $controller->processRequest();











/*
    if(file_exists($controller_file)){                                  //vérifi que le controlleur existe
        include($controller_file);

        $data = explode('?', $object_name);
        if($data[0][-1] = "s"){
            array_pop($data[0]);
        }
        if(file_exists( "models/" . ucfirst($data[0]) . ".php")){ //vérifi que l'objet existe               
            $class = new $apiEndpoint;
            call_user_func_array([$class, $data[0]], $url);
        }else{
            $doc = new DOMDocument();                   /* VwV route inéxistente revoie vers page 404 VwV 
            $doc->loadHTMLFile("views/404.html");
            echo $doc->saveHTML();
            return;
        }
    }else{
        $doc = new DOMDocument();
        $doc->loadHTMLFile("views/404.html");
        echo $doc->saveHTML();
        return;
    }

return;*/