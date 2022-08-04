<?php
include_once '../includes/database.php';
class User
{

    var $id;
    var $username;
    var $password;


public function login_user(){
    global $database;

    $sql="Select * from users where username='".$this->username."' AND password='".$this->password."'";
    $result=$database->query($sql);
    return $database->check_Login($result);
}

}

$user=new User();
