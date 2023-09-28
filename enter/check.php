
<?php
include_once "../pages/connect.php";


$userName = $_POST['name'];
$userPass = $_POST['password'];
$userId = $_POST['id'];


    $enterPass = mysqli_query($connect, "SELECT * FROM `user` WHERE `logo` LIKE '$userName'");
    $realPass = mysqli_fetch_assoc($enterPass);

if ($_POST['password'] == $realPass['password']) {

    $encodedUsername = urlencode($userName);
    $encodedIdname = urlencode($userId);
    $url = "../index.php?username=$encodedUsername&userid=$encodedIdname";
    header("Location: $url");
    exit;
} else {
    $errorPass = urldecode("Не верный логин или пароль!");
    header("Location: ../enter/enter.php?errorname=$errorPass");
    
    exit;
}



