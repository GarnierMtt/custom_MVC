<?php

class Help {
    public function __construct() {   
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }
}