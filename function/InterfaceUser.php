<?php

interface InterfaceUser{
    public function getUser();
    public function getUserDetail($id);
    public function createUser($data);
    public function updateUser($data);
    public function deleteUser($id);
}