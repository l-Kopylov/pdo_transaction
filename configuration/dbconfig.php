<?php 
class DbConnection{
    private $DATABASE_HOST = 'localhost';
    private $DATABASE_USER = 'homestead';
    private $DATABASE_PASS = 'secret';
    private $DATABASE_NAME = 'pdo1';
    public $conn;

    public function __construct(){
        try {
            $this->conn = new PDO('mysql:host=' . $this->DATABASE_HOST . ';dbname=' . $this->DATABASE_NAME . ';charset=utf8', $this->DATABASE_USER, $this->DATABASE_PASS);
        } catch (PDOException $exception) {
            exit('Failed to connect to database!');
        }
    }
    
}
$dbconnection = new DbConnection();
?>