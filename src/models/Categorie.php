<?php

include("src/models/Database.php");


class Categorie {
    private $id;
    private $name;


    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function GET() {
        $sql = "SELECT * FROM categorie";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct() {
        $this->db->close();
    }
}