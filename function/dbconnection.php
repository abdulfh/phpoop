<?php
class Database{
    private $host = 'localhost';
    private $username = 'newuser';
    private $password = 'hallo';
    private $db = 'phpoop';
    private $dbh;
    private $stmt;
    
    function __construct(){
        $dsn = 'mysql:host=' . $this->host. ';dbname=' . $this->db;
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dsn, $this->username, $this->password, $option);
            echo "Success";
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    public function resultSet(){
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function execute(){
       return $this->stmt->execute();
    }
    public function bind($param, $value, $type = NULL)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value) : 
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) : 
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
}