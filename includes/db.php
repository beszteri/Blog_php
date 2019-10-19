<?php


class db
{

    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "szallasblog";
    private $conn;
    public $resultsPerPage = 9;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            die("DB Connection Failed" . $e->getMessage());
        }
    }
    

    public function searchUser($name, $password) {
        $sql = "SELECT * FROM users WHERE name='$name' and password='$password';";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    function getUserById($id)
	{
        $sql = "SELECT * FROM users WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return user;

		// returns user in an array format: 
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
    }
    
    function getAllPosts() {
        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    function numberOfResults() {
        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numberOfResults = count($posts);
        return $numberOfResults;
    }
    function numberOfPages(){
        return ceil($this->numberOfResults() / $this->resultsPerPage);
    }

    function limitTheResults($from, $limit) {
        $sql = "SELECT * FROM posts LIMIT " . $from . "," . $limit . ";";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $limitedPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $limitedPosts;
    }

}