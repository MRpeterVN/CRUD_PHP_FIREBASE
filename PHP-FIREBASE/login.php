<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $pass = $_POST['password'];
    echo "Username: " . $username . "<br>";
    echo "Password: " . $pass . "<br>";

    if($username ="admin" && $pass ="admin"){
        header("Location: index.php");
        exit();
    }
    // else
    // {

    // }
    // else
    // {

    // }


}
?>
