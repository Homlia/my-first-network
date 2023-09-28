<?php
        $title = "Чаты";
        include "../pages/header.php";
?>

        <main>
            <?php
                include "../pages/side.php";
            ?>
            <article class="content">
                <section class="search-chats">
                    <form action="../pages/chats.php?username=<?php echo $_REQUEST['username'] ?>" method="get">
                    <label for="search-chats-input">
                        <input type="hidden" name="username" value="<?php echo $_REQUEST['username'] ?>">
                        <input type="text" id="search-chats-input" name="searchChat" value="<?php echo $_GET['searchChat'] ?>" placeholder="Поиск чата">
                        <button type="submit">
                            <div></div>
                        </button>
                    </label>
                    </form>
                </section>
                <section class="chat-block">
                <?php

                    $allLogo = mysqli_query($connect, "SELECT `logo` FROM `user`");
                    $arr = [];
                    while ($a = mysqli_fetch_assoc($allLogo)) {
                        $arr[] = $a;
                    };
                    
                        function findTextInArray($array, $fragment) {
                            $foundItems = array();

                            for ($i = 0; $i < count($array); $i++) {
                                // Ищем фрагмент в текущем элементе массива
                                if (@strpos($array[$i]['logo'], $fragment) !== false) {
                                    // Если фрагмент найден, добавляем элемент в список найденных
                                    $foundItems[] = $array[$i]['logo'];
                                }
                            }

                            return $foundItems;
                        }
                        $username = $_REQUEST['username'];
                        if ($_GET['searchChat']) {
                            $result = findTextInArray($arr, $_GET['searchChat']);
                        foreach($result as $logo) {
                            $seaechInfo = mysqli_query($connect, "SELECT `logo`, `img` FROM `user` WHERE `logo` LIKE '$logo'");
                        while ($row = mysqli_fetch_assoc($seaechInfo)) {
                            if ($row['logo'] != "$username") {
                                $another = $row['logo'];

                                echo '<a href="../pages/openChat.php?another=' . $another . '&username=' . $username . '&userImg='.$row['img'].'">
                                        <article class="chat">
                                            <figure friend-img>
                                                <img src="/img/icon/' . $row['img'] . '" alt="Аватар пользователя">
                                            </figure>
                                            <div class="chat-info">
                                                <h2>' . $row['logo'] . '</h2>
                                            </div>
                                        </article>
                                    </a>';
                            }
                        }
                                }
                        } else {
                        $seaechInfo = mysqli_query($connect, "SELECT `user1` FROM `chats` WHERE `whose` LIKE '0' AND user2 LIKE '$username'");
                        while ($row = mysqli_fetch_assoc($seaechInfo)) {
                            if ($row['user1'] != "" && $row['user1'] != "$username") {
                            $user1 = $row['user1'];

                                $another = $row['user1'];

                        echo '<a href="../pages/openChat.php?another='.$another.'&username='.$username.'">
                                <article class="chat">
                                    <figure friend-img>
                                        <img src="/img/icon/'. $row['user_img'] .'" alt="Аватар пользователя">
                                    </figure>
                                    <div class="chat-info">
                                        <h2>'. $row['user1'] .'</h2>
                                    </div>
                                </article>
                            </a>';
                            }
                                
                            }
                            $seaechInfo2 = mysqli_query($connect, "SELECT `user2`, `user_img` FROM `chats` WHERE `whose` LIKE '0' AND user1 LIKE '$username'");
                        while ($row2 = mysqli_fetch_assoc($seaechInfo2)) {
                            if ($row2['user2'] != "" && $row2['user2'] != "$username") {


                                $another = $row2['user2'];

                        echo '<a href="../pages/openChat.php?another='.$another.'&username='.$username.'&userImg='.$row2['user_img'].'">
                                <article class="chat">
                                    <figure friend-img>
                                        <img src="/img/icon/'. $row2['user_img'] .'" alt="Аватар пользователя">
                                    </figure>
                                    <div class="chat-info">
                                        <h2>'. $row2['user2'] .'</h2>
                                    </div>
                                </article>
                            </a>';
                            }
                            }
                        }
                    ?>
                    
                </section>
            </article>
        </main>
        <footer>Все права защищены &copy;</footer>
    </div>

    <script src="script.js"></script>
</body>

</html>