<?php

include("src/models/Database.php");


class Realisation {
    private $id;
    private $intitulee;
    private $description;
    private $periodeStart;
    private $periodeEnd;
    private $idLabel;


    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function GET() {
        $sql = "SELECT * FROM realisation";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct() {
        $this->db->close();
    }
}