<?php
            include "../pages/header.php";
        ?>

        <main>
            <?php
                include "../pages/side.php";
            ?>
            <article class="content">
                <section class="basic-info">
                    
                        
                        <?php
                        // Экранировать значение, чтобы избежать SQL-инъекций (рекомендуется использовать подготовленные запросы)
                        $another =$_GET['another'];
                        $username =$_GET['username'];

                        $info = mysqli_query($connect, "SELECT `logo`, `img`, `data`,`email`, `tell`  FROM `user` WHERE `logo` LIKE '$another'");
                        
                        $row = mysqli_fetch_assoc($info);
                        ?>
                        <div class="basic-info__avatar">
                        <img src="/img/icon/<?php echo $row['img']?>" alt="аватар пользоваталя">
                        <br>
                        <?php 
                        $infoSubscription = mysqli_query($connect, "SELECT * FROM `friend` WHERE `friend` LIKE '$another' AND `user` LIKE '$username'");
                        $rowSubscription = mysqli_fetch_assoc($infoSubscription);
                        $sub;

                        if ($rowSubscription['id'] != '') {
                            $subscriptionStatus = "Отписаться";
                            $sub = 1;
                        } else {
                            $subscriptionStatus = "Подписаться";
                            $sub = 2;
                        }
                        // print_r($rowSubscription);
                        // echo $rowSubscription;
                        ?>
                        <form action="../pages/subscription.php" method="get">
                            <input type="hidden" name="another" value="<?php echo $_GET['another'];?>">
                            <input type="hidden" name="username" value="<?php echo $_GET['username'];?>">
                            <input type="hidden" name="img" value="<?php echo $row['img']?>">
                            <input type="hidden" name="data" value="<?php echo $row['data'];?>">
                            <input type="hidden" name="sub" value="<?php echo $sub;?>">
                            <button type="submit"><?php echo $subscriptionStatus ?></button>
                        </form>
                        </div>
                        <div class="basic-info__information">
                            <div class="birth">
                            <p><?php echo $row['logo'];?></p>
                        </div>
                        <div class="birth">Дата рождения:
                            <p><?php echo $row['data']; ?></p>
                        </div>
                        <div class="email">Email:
                            <p><?php echo $row['email']; ?></p>
                        </div>

                        <div class="phone">Номер телефона:
                            <p><?php echo $row['tell']; ?></p>
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