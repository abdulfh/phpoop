<?php
header("Content-Type: application/json; charset=UTF-8");
include 'function/UserImplements.php';

if(@$_GET){
    $UI = new UserImplements();
    echo json_encode($UI->userProfile());
}