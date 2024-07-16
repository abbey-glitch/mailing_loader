<?php
ini_set('display_errors', 1);
if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['upload'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $imgdesc = htmlspecialchars(trim($_POST['imgdesc']));
    $password = htmlspecialchars(trim($_POST['password']));
    $empty = [];
    if(empty($email)){
        $empty[] = "email is required";
    }
    if(empty($imgdesc)){
        $empty[] = "imgdesc is required";
    }
    if(empty($password)){
        $empty[] = "password is required";
    }
    if(!empty($empty)){
        foreach($empty as $msg){
            echo $msg;
            echo "<br>";
        }
    }
    if(isset($_POST['upload']) || isset($_FILES['image'])){
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
       
        // get format of image
        $img_path = array("image/jpeg" => "jpeg", "image/jpg"=> "jpg", "image/png" => "png", "image/gif"=> "gif");
        $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        if(!in_array($img_ext, $img_path)){
            echo "image path is not a match";
        }else{
            // echo "move the uploaded file to a directory";
            if($img_size > 8000){
                echo"image is too large.<br>";
            }else{
                if(is_dir("images")){
                    echo "image folder already exists";
                    move_uploaded_file($tmp_name, "images/.$img_name");
                    require "mail.php";
                    $feedback = sendmail($email);
                    echo $feedback;
                }else{
                    mkdir("images");
                    echo "image folder created";
                }
                // if(is_dir("images/.$img_name")){
                //     echo "image already exists";
                // }else{
                //     // mkdir("images");
                //     move_uploaded_file($tmp_name, "images/.$img_name");
                // }
            }
           
        }
    }
}else{
    echo "Invalid request";
}