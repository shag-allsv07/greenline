<?php if($_SESSION['is_admin'] == '1') : ?>
<?php //форма добавления новости ?>
<?php else: ?>
<form method="post">
    <label for="login">Логин</label>
    <input type="text" name="login" id=""><br><br>
    <label for="password">Пароль</label>
    <input type="password" name="password" id=""><br><br>
    <input type="submit" value="Войти">
</form>
<?php endif; ?>