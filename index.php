<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/*#############################################################################################################
/*                                          fètch data
/*#############################################################################################################*/

    $url = explode('/', $_SERVER['REQUEST_URI']);
    if(end($url) == ""){
        array_pop($url);
    }

/*#############################################################################################################
/*                                          data définitions
/*#############################################################################################################*/

    $urlLength = count($url);
    // trie les données pour récupérer le controlleur, la méthode et les paramètres
    if ($urlLength > 4){                              //si controleur spécifier 
        $controller_name = ucfirst($url[4]);
        if($urlLength > 5){                           //si méthode spécifier
            $action_name = $url[5];
            for($i = 0; $i < 6; $i++){
                array_shift($url);              //récupère paramètres
            }
        }else{
            $action_name = 'index';                 //si méthode et paramètre non spécifier
            $url = [];                              //
        }
    }else{
        $controller_name = 'Portfolio';             //si rien n'est spésifier
        $action_name = 'index';                     //
        $url = [];                                  //
    }

    $controller_file = "controllers/" . $controller_name . ".php"; //chemain du fichier controlleur

/*#############################################################################################################
/*                                                 routting
/*#############################################################################################################*/

    if(file_exists($controller_file)){                                  //vérifi que le controlleur existe
        include($controller_file);
        if(isControllerMethod($action_name)){                           //vérifi que la méthode existe
            $class = new $controller_name;
            call_user_func_array([$class, $action_name], $url);
        }else{
            $doc = new DOMDocument();                   /* VwV route inéxistente revoie vers page 404 VwV */
            $doc->loadHTMLFile("views/404.php");
            echo $doc->saveHTML();
        }
    }else{
        $doc = new DOMDocument();
        $doc->loadHTMLFile("views/404.php");
        echo $doc->saveHTML();
    }

