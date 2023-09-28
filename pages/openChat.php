<?php
        $title = "чат " . $_GET['another'];
        include "../pages/header.php";
?>

        <main>
            <?php
                include "../pages/side.php";
            ?>
            <article class="content">
                <section class="open-chat-text">

                    <?php
                    $user1 = $_REQUEST['username'];
                    $user2 = $_REQUEST['another'];
                    $userImg = $_REQUEST['userImg'];


                    $CheckChat = mysqli_query($connect, "SELECT `user1`, `user2` FROM `chats` WHERE user1 LIKE '$user1' AND user2 LIKE '$user2'");
                    $readChat = mysqli_fetch_assoc($CheckChat);
                    if ($readChat) {

                        $chat = mysqli_query($connect, "SELECT * FROM `chats` WHERE user1 LIKE '$user1' AND user2 LIKE '$user2'");
                        while ($row = mysqli_fetch_assoc($chat)) {
                            if ($row['whose'] == 1) {
                                echo '<div class="open-chat-text-right">
                                        <p>' . $row['text'] . '</p>
                                    </div>';


                            }
                            if ($row['whose'] == 2) {
                                echo '<div class="open-chat-text-left">
                                        <p>'. $row['text'] .'</p>
                                    </div>';
                            }
                        }
                    } else {

                        // Другой вариант получения базы данных
                        

                        $CheckChat2 = mysqli_query($connect, "SELECT `user2`, `user1` FROM `chats` WHERE user1 LIKE '$user2' AND user2 LIKE '$user1'");
                        $readChat2 = mysqli_fetch_assoc($CheckChat2);

                        if ($readChat2) {
                            
                            $chat = mysqli_query($connect, "SELECT * FROM `chats` WHERE user1 LIKE '$user2' AND user2 LIKE '$user1'");

                        while ($row = mysqli_fetch_assoc($chat)) {
                            if ($row['whose'] == 2) {
                                echo '<div class="open-chat-text-right">
                                        <p>' . $row['text'] . '</p>
                                    </div>';


                            }
                            if ($row['whose'] == 1) {
                                echo '<div class="open-chat-text-left">
                                        <p>'. $row['text'] .'</p>
                                    </div>';
                            }
                        }
                        } else {
                            echo "Таого чата не существует";
                            mysqli_query($connect, "INSERT INTO `chats` (`user1`, `user2`, `user_img` ,`whose`) VALUES ('$user1', '$user2', '$userImg','0')");
                            header("Location: ../pages/openChat.php?username=$user1&another=$user2");
                        }
                        
                    }
                    // print_r($readChat);

                    ?>

                    
                </section>
                <section class="search-open-chat">
                    <form action="../pages/sendChat.php" method="get">
                    <label for="search-open-chat-input">
                        <input type="hidden" name="username" value="<?php echo $_REQUEST['username'] ?>">
                        <input type="hidden" name="another" value="<?php echo $_REQUEST['another'] ?>">
                        <input type="text" id="search-open-chat-input" name="text" placeholder="Написать сообщение">
                        <button type="submit">
                            <div></div>
                        </button>
                    </label>
                    </form>
                </section>
            </article>
        </main>
        <footer>Все права защищены &copy;</footer>


    </div>

    <script src="script.js"></script>
</body>

</html>