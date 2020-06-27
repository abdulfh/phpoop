<?php
header("Content-Type: application/json; charset=UTF-8");
include 'function/UserImplements.php';

if(@$_POST){
    $UI = new UserImplements();
    try {
        echo json_encode($UI->createUser(@$_POST));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}