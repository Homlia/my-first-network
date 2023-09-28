<?php
include_once "../pages/connect.php";



$userName = $_GET['settingName'];
$userPass = $_GET['userpass'];
$newPass = $_GET['newpass'];
$newPass2 = $_GET['newpass2'];
$userId = $_GET['userid'];


echo "id = " .$userId . "<br>";

    



    if (!empty($newPass) && isset($newPass)) {
        mysqli_query($connect, "UPDATE `user` SET `logo`='$userName' WHERE `id`='$userId'");
    }

    if ($newPass == $newPass2) {
        $realPass = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `password` FROM `user` WHERE `id` LIKE '$userId'"));
        if ($userPass == $realPass['password'] && !empty($newPass) && isset($newPass)) {
                mysqli_query($connect, "UPDATE `user` SET `password`='$newPass' WHERE `id`='$userId'");
        }
    }

    $encodedUsername = urlencode($userName);
    $encodedIdname = urlencode($userId);
    $url = "../pages/settings.php?username=$encodedUsername&userid=$encodedIdname";
    header("Location: $url");
    exit;
