<?php

require_once 'db.php';
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbName = DB_NAME;
    
    private $connection;
    private $error;
    private $statement;
    private static $instance = null;
    
    private function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass);
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
        }
    }
    
    public static function getInstance(){
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return  self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }

    public function getError() {
        return $this->error;
    }
    
    public function prepareStatement($query)
    {
        $this->statement = $this->connection->prepare($query);
    }
    
    public function execute()
    {
        return $this->statement->execute();
    }
    
    public function executeReturnId()
    {
        if ($this->statement->execute()) {
            return $this->connection->lastInsertId();
        } else {
            return false;
        }
    }
    
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
                
    }

    public function bind($parameter, $value, $type = null)
    {
        if (is_null($type)) {
            if (is_int($value)) {
                $type = PDO::PARAM_INT;
            } elseif (is_bool($value)) {
                $type = PDO::PARAM_BOOL;
            } elseif (is_null($value)) {
                $type = PDO::PARAM_NULL;
            } else {
                $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($parameter, $value, $type);
    }
    
}
