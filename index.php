<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/nullifingStyle.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/friendsStyle.css">
    <link rel="stylesheet" href="style/chatsStyle.css">
    <link rel="stylesheet" href="style/settings.css">
    <link rel="stylesheet" href="style/openChat.css">
    <link rel="stylesheet" href="style/openProfile.css">
    <title>Главная страница</title>
</head>
<body>

    <div class="wrraper">
        <header>
            <div>
                <a class="header-link" href="/?username=<?php echo $_REQUEST['username'] ?>&userid=<?php echo $_GET['userid'] ?>">Сеть</a>
            </div>
            <div>
                <a class="header-link" href="/enter/enter.php">Выход</a>
            </div>
        </header>

        <main>
            <?php
                include "pages/side.php";
            ?>
            <article class="content">
                <section class="basic-info">
                    <div class="basic-info__avatar">
                        <img src="/img/icon/avatar-man.png" alt="аватар пользоваталя">
                    </div>
                    <div class="basic-info__information">
                        <h2><?php echo $_GET['username']; ?></h1>
                        <div class="birth">Дата рождения:
                            <p>21.02.2002</p>
                        </div>
                        <div class="email">Email:
                            <p>email@gmail.com</p>
                        </div>
                        
                        <div class="phone">Номер телефона:
                            <p>+7(___)__-__-___</p>
                        </div>
                    </div>
                </section>
                <section class="gallery">
                    <h2>Фото и видео</h2>
                </section>
            </article>
        </main>
    <footer>Все права защищены &copy;</footer>






    </div>

    <script src="script.js"></script>
</body>
</html>

