<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get_by_id($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function save($user) {
        // Prepare and execute SQL query to insert or update user data
    }

    public function __destruct() {
        $this->db->close();
    }
}