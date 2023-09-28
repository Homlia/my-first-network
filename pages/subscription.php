<?php 
include "../pages/connect.php";

$another =$_GET['another'];
$username =$_GET['username'];
$img =$_GET['img'];
$data =$_GET['data'];
$sub =$_GET['sub'];

if ($sub == 1) {
    $subscriptionStatus = "Отписаться";
    mysqli_query($connect, "DELETE FROM `friend` WHERE `friend` LIKE '$another' AND `user` LIKE '$username'");
    echo "del";
} else {
    $subscriptionStatus = "Подписаться";
    mysqli_query($connect, "INSERT INTO `friend` (`user`, `friend`, `img`, `data`) VALUES ('$username', '$another', '$img', '$data')");
    echo "ins";
}

header("Location: ../pages/openProfile.php?username=$username&another=$another");

exit;