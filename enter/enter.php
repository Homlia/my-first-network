<?php
        $title = "Вход в...";
        include_once "../pages/addStyle.php";
        
        echo $_GET['errorname'];
?>

    
    <div class="wrraper enter-wrraper">
        <section class="enter-section">
            <form action="../enter/check.php" method="post">
                <h1>Вход в ...</h1>
                <label for="input-name">
                    <input tabindex="1" type="text" name="name" id="input-name" placeholder="Ввведите логин" required>
                </label>
                <label for="input-pass">
                    <input tabindex="2" type="password" name="password" id="input-pass" placeholder="Ввведите пароль" required>
                </label>
                <button tabindex="3" type="submit">Войти</button>
                <a tabindex="4" href="../enter/registration.php">Регистрация</a>
            </form>
        </section>
    </div>

    <script src="script.js"></script>
</body>

</html>