<?php

class View {
    private $storData;

    public function loadView($file, $data){
        $lines = file("views/" . $file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $storData = $data;

        $this->scan($lines);
    }

    private function scan($lines){
        if (!empty($lines[0])){
            if (preg_match("/\{\{\^ ?([\s\S][^}]+[^ ]) ?\^\}\}/ ", $lines[0], $matches)){
                explode(' ', $matches[1]);
                array_shift($lines);
                $this->scan($lines);
            }elseif (preg_match("/\{\{\% ?([\s\S][^}]+[^ ]) ?\%\}\}/ ", $lines[0], $matches)){
                echo $matches[1] . "<br>";
                array_shift($lines);
                $this->scan($lines);
            }else{
                echo $lines[0] . "\n";
                array_shift($lines);
                $this->scan($lines);
            }
        }
        return;
    }

}









/*
        // Create a new DOMDocument
        $doc = new DOMDocument();

        // Load the HTML file
        $doc->loadHTMLFile("views/portfolio/index.php");

        $doc->getElementsByTagName('corpTableau')->append("coucou !!!!");

        // Create an HTML document and display it
        echo $doc->saveHTML();


 echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";

        foreach ($lines as $line_num => $line) {
            if (preg_match("", $line)){

            }
        }
*/