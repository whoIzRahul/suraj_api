<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include '../includes/database.php';
    include '../models/user.php';

    if ($database->escape_value($_POST['username'])) {
        echo (json_encode(array('Success' => 0, 'Message' => 'Username is required!')));
        die();
    }
    if ($database->escape_value($_POST['password'])) {
        echo (json_encode(array('Success' => 0, 'Message' => 'Password is required!')));
        die();
    }
$user->username=$_POST['username'];
$user->password=$_POST['password'];

if($user->login_user()){
    echo (json_encode(array('Success' => 1, 'Message' => 'Login Success')));
}else{
    echo (json_encode(array('Success' => 0, 'Message' => 'Credentials don\'t match!')));
}

} else {
    http_response_code(500);
    echo ('Method not allowed');
}
