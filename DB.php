<?php


class DB
{

    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "szallasBlog";
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host" . $this->dbHost . ";dbname=" . $this->dbName;
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die("DB connection failed" . $e->getMessage());
        }
    }



}