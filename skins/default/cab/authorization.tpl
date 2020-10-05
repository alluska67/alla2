<div class="cab">
  <div class="cab_inside">
    <?php if (!isset($status) || $status != 'Ok') { echo @$errors; ?>
      <form action="" method="post">
        Login:<input class="cab_table" type="text" name="login"><br>
        Pass: <input class="cab_table" type="password" name="password"><br>
        <input type="checkbox" value="autoauth" name="autoauth" id="autoauth"><label for="autoauth">Запомнить меня для автовхода</label><br>
        <input class="cab_table" type="submit" name="submit" value="Вход">
      </form>
    <?php } else { ?>
      <h3>Поздравляю <span class="user"><?php echo $_SESSION['user']['login']; ?></span>, вы авторизированы как пользователь!</h3>
    <?php } ?>
  </div>
</div>



