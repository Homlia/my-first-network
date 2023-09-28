<?php
include "../pages/connect.php";

print_r($_REQUEST);

$user1 = $_REQUEST['username'];
$user2 = $_REQUEST['another'];
$text = $_REQUEST['text'];


$CheckChat = mysqli_query($connect, "SELECT `user1`, `user2` FROM `chats` WHERE user1 LIKE '$user1' AND user2 LIKE '$user2'");
$readChat = mysqli_fetch_assoc($CheckChat);
if ($readChat) {

    mysqli_query($connect, "INSERT INTO `chats` (`user1`, `user2`, `text`, `whose`) VALUES ('$user1', '$user2', '$text', '1')");
    header("Location: ../pages/openChat.php?username=$user1&another=$user2");

    exit;
} else {

    mysqli_query($connect, "INSERT INTO `chats` (`user1`, `user2`, `text`, `whose`) VALUES ('$user2', '$user1', '$text', '2')");
    header("Location: ../pages/openChat.php?username=$user1&another=$user2");

    exit;
}
