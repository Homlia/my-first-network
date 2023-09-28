<?php 
    include_once "../pages/addStyle.php";
    include_once "../pages/connect.php";
?>

    <div class="wrraper">
        <header>
            <div>
                <a class="header-link" href="/?username=<?php echo $_GET['username'] ?>&userid=<?php echo $_GET['userid'] ?>">Сеть</a>
            </div>
            <div>
                <a class="header-link" href="/enter/enter.php">Выход</a>
            </div>
        </header>
