        <?php
        $title = "Настройки";
            include "../pages/header.php";
        ?>

        <main>
            <?php
                include "../pages/side.php";
            ?>
            <article class="content content-seting">
                <section class="basic-info basic-info-section">
                    <nav class="setting-nav">
                    
                        <ul>
                            <li data-setting-li="1">Настройки профиля</li>
                        </ul>
                    </nav>
                    <div class="setting-pages">
                        <form action="../pages/updateInfo.php" method="GET">
                        <?php
                            $GETuser = $_GET['username'];
                            $userInfo = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `user` WHERE `logo` LIKE '$GETuser'"));
                        ?>
                        <input type="hidden" name="userid" value="<?php  echo $userInfo['id'] ?>">
                        
                        <table id="setting-profile" class="display__table">
                            <tr>
                                <td>
                                    <p>
                                        Сменить логин:
                                    </p>
                                </td>
                                <td>
                                    <br>
                                    <input type="text" name="settingName" value="<?php echo $userInfo['logo']; ?>">
                                    <br>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>
                                    <p>
                                        Сменить фамилию:
                                    </p>
                                </td>
                                <td>
                                    <input type="text">
                                </td>
                            </tr> -->
                            <tr>
                                <td>
                                    <p>
                                        Сменить пароль:
                                    </p>
                                </td>
                                <td>
                                    <br>
                                    <input type="password" name="userpass" placeholder="Введите текущий пароль">
                                    <br>
                                    <input type="password" name="newpass" placeholder="Введите новый пароль">
                                    <br>
                                    <input type="password" name="newpass2" placeholder="Повторите новый пароль">
                                </td>
                            </tr>
                        </table>
                        <!-- <table data-setting-li-index="2" id="setting-topic">
                            <tr>
                                <td>
                                    <p>Выбор темы:</p>
                                </td>
                                <td>
                                    <select>
                                    <option value="while">Стандартная</option>
                                    <option value="black">Тёмная</option>
                                    </select>
                                </td>
                            </tr>
                        </table> -->
                        <button type="submit">Сохранить изменения</button>
                        </form>
                    </div>
                </section>
            </article>
        </main>



        <footer>Все права защищены &copy;</footer>





    </div>




    
    <script src="script.js"></script>
    <script src="/script/scriptSetting.js"></script>
</body>

</html>