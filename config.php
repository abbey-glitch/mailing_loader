<?php
$_host = "localhost";
$_user = "root";
$_pass = "password";
$_db = "usercred";

try{
    $conn = mysqli_connect($_host, $_user, $_pass, $_db);
    if($conn){
        echo "connected successfully";
    }
}catch(Exception $e){
    echo $e->getMessage();
}