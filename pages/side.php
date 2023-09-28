<aside>
                <nav>
                    <ul class="side-list">
                        <li>
                            <a href="/?username=<?php echo $_REQUEST['username'] ?>&userid=<?php echo $_GET['userid'] ?>">Главная</a>
                        </li>
                        <li>
                            <a href="/pages/friends.php?username=<?php echo $_REQUEST['username'] ?>&userid=<?php echo $_GET['userid'] ?>">Подписки</a>
                        </li>
                        <li>
                            <a href="/pages/chats.php?username=<?php echo $_REQUEST['username'] ?>&userid=<?php echo $_GET['userid'] ?>">Чаты</a>
                        </li>
                    </ul>
                    <figure class="side-icon-settings">
                        <a href="/pages/settings.php?username=<?php echo $_REQUEST['username'] ?>&userid=<?php echo $_GET['userid'] ?>">
                            <img src="/img/icon/setting.png" alt="Настройки">
                        </a>
                    </figure>
                </nav>
            </aside>