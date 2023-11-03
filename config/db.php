<?php
class db {
    private $host = "localhost";
    private $dbname = "crm_db";
    private $user = "root";
    private $password = "";
    public function conexion() {
        try {
            $PDO = new PDO("mysql:host=".$this->host.";port=3306;dbname=".$this->dbname,$this->user,$this->password);
            return $PDO;
        } catch (PDOException $e) {
            echo "<script>alert('Error conectando la base de datos')</script>";
            return $e->getMessage();
        }
    }
}