<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    setcookie("username", $name, time() + (86400 * 7), "/"); 
    
    header("Location: home.html");
    exit();
}
?>
