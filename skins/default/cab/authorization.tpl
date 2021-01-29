<div class="cab">
  <div class="cab_inside">
    <?php if (!isset($status) || $status != 'Ok') { echo $errors ?? " "; ?>
        <form action="/cab/authorization" method="post" class="auth_form" >
            Login:<input class="cab_table" type="text" name="login" id="login"><br>
            Pass: <input class="cab_table" type="password" name="password" id="password"><br>
            <input type="hidden" name="uri" value="<?=$_SERVER['REQUEST_URI'];?>" >
            <input type="checkbox" value="autoauth" name="autoauth" id="autoauth1"><label for="autoauth1" class="form_text">Запомнить</label><br>
            <input class="cab_table" type="submit" name="submit" value="Вход" id="submit" >
        </form>
    <?php } else { ?>
      <h3>Поздравляю <span class="user"><?=$_SESSION['user']['login']; ?></span>, вы авторизированы как пользователь!</h3>
    <?php } ?>
  </div>
</div>


