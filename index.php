<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("src/controllers/APIController.php");

/*#############################################################################################################
*                                           fètch data
* #############################################################################################################*/

    $controller = new APIController();

    var_dump($controller);die;
    
/*#############################################################################################################
*                                           data définitions
* #############################################################################################################
*    url : http://163.172.44.107/matteo/custom_MVC/ [0]       [1]
*                                            {path}< ^method/  ^objet(s) >  ?{query}  #{fragment}
*/













    $urlLength = count($url);
    // trie les données pour récupérer le controlleur, la méthode et les paramètres
    if ($urlLength > 4){                              //si la méthode est spécifier 
        $apiEndpoint = strtoupper($url[4]);
        if($urlLength > 5){                           //si l'objet est spécifier
            $object_name = $url[5];
            for($i = 0; $i < 6; $i++){
                array_shift($url);              //récupère paramètres
            }
        }else{
            $object_name = 'help';                 //si objet non spécifier
            $url = [];                              //
        }
    }else{
        $apiEndpoint = 'API';             //si rien n'est spésifier
        $object_name = 'help';                     //
        $url = [];                                  //
    }

    $apiEndpoint .= "Controller";
    $controller_file = "controllers/" . $apiEndpoint . ".php"; //chemain du fichier controlleur

/*#############################################################################################################
/*                                                 routting
/*#############################################################################################################*/

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
            $doc = new DOMDocument();                   /* VwV route inéxistente revoie vers page 404 VwV */
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

return;