<?php   
        $title = "Регистрация";
        include_once "../pages/addStyle.php";
?>

    <div class="wrraper enter-wrraper">
        <section class="enter-section registration-section">
            <form action="../enter/checkRegistration.php" method="post">
                <h1>Регистрация в ...</h1>
                <label for="input-name">
                    <?php echo @$_GET['isName']; ?>
                    <input tabindex="1" type="text" name="username" id="input-name" placeholder="Ввведите логин" required>
                </label>
                <label for="input-pass">
                    <?php echo @$_GET['isPass']; ?>
                    <input tabindex="2" type="password" name="userpass" id="input-pass" placeholder="Ввведите пароль" required>
                </label>
                <label for="input-pass-2">
                    <input tabindex="3" type="password" name="checkUserPass" id="input-pass-2" placeholder="Повторите пароль" required>
                </label>
                <h2>Пол:</h2>
                <br>
                <div class="registration-radio-block">
                    <label for="input-sex-m">
                    <input tabindex="6" type="radio" name="sex" id="input-sex-m" value="man" checked>
                    <p>мужчина</p>
                </label>
                <label for="input-sex-w">
                    <input tabindex="6" type="radio" name="sex" id="input-sex-w" value="woman">
                    <p>женщина</p>
                    </label>
                </div>
                <h2>День рождения:</h2>
                <br>
                <div class="registration-option">
                    
                    <select name="day" id="">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo '<option value='. $i .'>'. $i .'</option>';
                        }
                        ?>
                    </select>
                    <select name="month" id="">
                        <option value="1">Январь</option>
                        <option value="2">Февраль</option>
                        <option value="3">Март</option>
                        <option value="4">Апрель</option>
                        <option value="5">Май</option>
                        <option value="6">Июнь</option>
                        <option value="7">Июль</option>
                        <option value="8">Август</option>
                        <option value="9">Сентябрь</option>
                        <option value="10">Октябрь</option>
                        <option value="11">Ноябрь</option>
                        <option value="12">Декабрь</option>
                    </select>

                    <select name="year" id="">
                        <?php
                        for ($i = date("Y") - 1; $i >= 1920; $i--) {
                            echo '<option value='. $i .'>'. $i .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <label for="input-email">
                    <input tabindex="4" type="email" name="useremail" id="input-email" placeholder="Email (не обязательно)">
                </label>
                <label for="input-tell">
                    <input tabindex="5" type="tel" name="usertel" id="input-tell" placeholder="Телефон (не обязательно)">
                </label>
                
                <button tabindex="7" type="submit">Зарегистрироваться</button>
            </form>
        </section>
    </div>

    <script src="script.js"></script>
</body>

</html>