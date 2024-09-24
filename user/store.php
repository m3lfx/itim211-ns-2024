<?php
    include("../includes/config.php");
   
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password = hash('sha256', $password);
    var_dump($password);
    $sql = "INSERT INTO users (email, password) VALUES('$email', '$password')";
    var_dump($sql);
    $result = mysqli_query($conn, $sql);
    if($result) {
      
        header("Location: ../index.php");
        
    }