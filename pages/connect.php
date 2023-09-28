
<?php

$connect = mysqli_connect("127.0.0.1", "root", "", "db-network");

$result = mysqli_query($connect, "SELECT * FROM `user`");
// $users = mysqli_fetch_assoc($result);