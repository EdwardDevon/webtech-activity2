<?php
require_once('config.php')
?>

<?php

if(isset($_POST)){
    $firstname   = $_POST['firstname'];
    $lastname    = $_POST['lastname'];
    $email       = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password    = sha1($_POST['password']);
    
    $sql = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?,?,?,?,?)";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute([$firstname, $lastname, $email, $phonenumber, $password]);

    if($result){
        echo 'Successfully saved.';
    } else {
        echo 'There were errors while saving the data.';
    }
} else {
    echo 'No data';
}