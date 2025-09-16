<?php

include("src/models/Database.php");


class Label {
    private $id;
    private $name;


    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getName() {
        $sql = "SELECT * FROM label";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    public function getLabels(){
        $sql = "SELECT * FROM label";
        if(isset($this->id)){
            $sql .= " WHERE id = " . $this->id;
        }
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct() {
        $this->db->close();
    }
}


/*
public function GET($data) {
        if(count($data[0]) > 1){
            $sql = "SELECT * FROM label WHERE id = " . $data[0][1];
        }else{
            $sql = "SELECT * FROM label";
        }
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
        */