<?php

include("models/Database.php");


class Realisation {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get_from_label($id) {
        $sql = "SELECT * FROM realisation WHERE idLabel = $id";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct() {
        $this->db->close();
    }
}