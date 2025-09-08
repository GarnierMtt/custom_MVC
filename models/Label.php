<?php

class Label {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get_all() {
        $sql = "SELECT * FROM label";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get_name($id) {
        $sql = "SELECT name FROM label WHERE id = $id";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function __destruct() {
        $this->db->close();
    }
}