<?php

class Database
{

    public $connection;

    public function __construct(){

        $dns = "mysql:host=localhost;dbname=Quiz;port=3306;charset=utf8mb4";

        $this->connection = new PDO($dns, 'root', '',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    
    }

    public function  query($query, $param=[]) {

        $statement = $this->connection->prepare($query);

        $statement->execute($param);

        return $statement;
        
    }
}

class DatabaseConnection 
{
    public static function connect() {
       return new Database();
    }
}