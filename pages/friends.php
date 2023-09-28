        <?php
        $title = "Подписки";
            include "../pages/header.php";
        ?>

        <main>
            <?php
                include "../pages/side.php";
            ?>
            <article class="content">
                <section class="search-friends">
                    <form action="../pages/friends.php" method="get">
                    <label for="search-friends-input">
                        <input type="hidden" name="username" value="<?php echo $_REQUEST['username'] ?>">
                        <input type="text" id="search-friends-input" name="searchFriends" value="<?php echo $_GET['searchFriends'] ?>" placeholder="Поиск">
                        <button type="submit">
                            <div></div>
                        </button>
                    </label>
                    </form>
                </section>
                <section class="friends-block">

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
                        if ($_GET['searchFriends']) {
                            $result = findTextInArray($arr, $_GET['searchFriends']);
                        foreach($result as $logo) {
                             $seaechInfo = mysqli_query($connect, "SELECT * FROM `user` WHERE `logo` LIKE '$logo'");
                                while ($row = mysqli_fetch_assoc($seaechInfo)) {

                                        $date1 = new DateTime();
                                        $date2 = new DateTime($row['data']);

                                        $interval = $date1->diff($date2);
                                        $years = $interval->y;

                                        $another = $row['logo'];

                                echo '<a href="../pages/openProfile.php?another='.$another.'&username='.$username.'">
                                        <article class="friend">
                                            <figure friend-img>
                                                <img src="/img/icon/'. $row['img'] .'" alt="Аватар пользователя">
                                            </figure>
                                            <div class="friend-info">
                                                <h2>'. $row['logo'] .'</h2>
                                                <p>'. $years . " " . "года" .'</p>
                                            </div>
                                        </article>
                                    </a>';
                                    }
                                    
                                }
                        } else {
                        $seaechInfo = mysqli_query($connect, "SELECT * FROM `friend` WHERE `user` LIKE '$username'");
                        while ($row = mysqli_fetch_assoc($seaechInfo)) {
                                $another = $row['friend'];

                                $date1 = new DateTime();
                                $date2 = new DateTime($row['data']);

                                $interval = $date1->diff($date2);
                                $years = $interval->y;

                        echo '<a href="../pages/openProfile.php?another='.$another.'&username='.$username.'">
                                <article class="chat">
                                    <figure friend-img>
                                        <img src="/img/icon/'. $row['img'] .'" alt="Аватар пользователя">
                                    </figure>
                                    <div class="chat-info">
                                        <h2>'. $row['friend'] .'</h2>
                                        <p>'. $years . " " . "года" .'</p>
                                    </div>
                                </article>
                            </a>';
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