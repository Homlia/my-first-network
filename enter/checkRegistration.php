<?php
include_once "../pages/connect.php";


$userName = $_POST['username'];
$userPass = $_POST['userpass'];
$userEmail = $_POST['useremail'];
$userTel = $_POST['usertel'];


echo print_r($_POST) . "<br>";
echo $_POST . "<br>";
echo $userName . "<br>";


$img;

if ($_POST['sex'] == "man") {
    $img = "avatar-man.png";
} else {
    $img = "avatar-woman.png";
}


$date = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];


// проверка пороля
if ($userPass == $_POST['checkUserPass']) {
    // проверка имени
    $seaechInfo = mysqli_query($connect, "SELECT `logo` FROM `user`");
    while ($row = mysqli_fetch_assoc($seaechInfo)) {
        if ($row['logo'] == $userName) {
            $isName = "Такое имя уже существует";
            header("Location: ../enter/registration.php?isName=$isName");
            exit;
        }
    }
    mysqli_query($connect, "INSERT INTO `user` (`logo`, `password`, `img`, `data`, `email`, `tell`) VALUES ('$userName', '$userPass', '$img', '$date', NULL, NULL)");
    echo "Ok";

    // header("Location: ../enter/enter.php");


    exit;
} else {
    $isPass = "Пароли не совпадают";
    header("Location: ../enter/registration.php?isPass=$isPass");
    // header("Location: ../enter/registration.php?");
    exit;
}