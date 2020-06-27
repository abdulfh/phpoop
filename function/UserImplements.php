<?php
include 'InterfaceUser.php';
include 'dbconnection.php';

class UserImplements implements InterfaceUser{
    private $db;
    function __construct(){
        $this->db = new Database();
    }

    public function getUser(){
        $this->db->prepare("SELECT * FROM User");
        return $this->db->resultSet();
    }
    public function getUserDetail($id){
        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(":id",$id,PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    public function createUser($data){
        $this->db->query("INSERT INTO user (first_name,last_name,email) VALUES (:first_name,:last_name,:email)");
        $this->db->bind(":first_name",$data['first_name'],PDO::PARAM_STR);
        $this->db->bind(":last_name",$data['last_name'],PDO::PARAM_STR);
        $this->db->bind(":email",$data['email'],PDO::PARAM_STR);
        return $this->db->execute();
    }
    public function updateUser($data){
        $this->db->query("UPDATE user SET first_name = :first_name,last_name = :last_name,email = :email WHERE id = :id");
        $this->db->bind(":id",$data['id'],PDO::PARAM_INT);
        $this->db->bind(":first_name",$data['first_name'],PDO::PARAM_STR);
        $this->db->bind(":last_name",$data['last_name'],PDO::PARAM_STR);
        $this->db->bind(":email",$data['email'],PDO::PARAM_STR);
        return $this->db->execute();
    }
    public function deleteUser($id){
        $this->db->query("DELETE FROM user WHERE id = :id");
        $this->db->bind(":id",$id,PDO::PARAM_STR);
        return $this->db->execute();
    }
    public function userProfile(){
        return 'ok';
    }
}