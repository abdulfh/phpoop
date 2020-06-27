<?php
header("Content-Type: application/json; charset=UTF-8");
include 'function/UserImplements.php';

if(@$_GET){
    $UI = new UserImplements();
    try {
        echo json_encode($UI->deleteUser(@$_GET['id']));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}