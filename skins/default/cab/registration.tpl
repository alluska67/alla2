<?php if (!isset($_SESSION['regok'])) { ?>
<div class="cab">
  <div class="cab_inside">
  <h2 class="total">Регистрация</h2>
    <form action="" method="post">
      <table>
        <tr>
          <td>Login *</td>
          <td><input class="cab_table" type="text" name="login" value="<?=htmlspecialchars($_POST['login'] ?? ''); ?>"></td>
          <td><?=$errors['login'] ?? ''; ?></td>
        </tr>
        <tr>
          <td>Password *</td>
          <td><input class="cab_table" type="password" name="password" value="<?=htmlspecialchars($_POST['password'] ?? ''); ?>"></td>
          <td><?=$errors['password'] ?? ''; ?></td>
        </tr>
        <tr>
          <td>Email *</td>
          <td><input class="cab_table" type="email" name="email" value="<?=htmlspecialchars($_POST['email'] ?? ''); ?>"></td>
          <td><?=$errors['email'] ?? ''; ?></td>
        </tr>
        <tr>
          <td>Age</td>
          <td><input class="cab_table" type="text" name="age" value="<?=htmlspecialchars($_POST['age']  ?? ''); ?>"></td>
          <td></td>
        </tr>
      </table>
      <p style="font-size: 10px"> * - обязательное поле к заполнению</p>
      <input class="cab_table" type="submit" name="send" value="Отправить запрос">
    </form>
      <?php } else { unset($_SESSION['regok']) ?>
        <div>Поздравляем, Вы успешно создали аккаунт на сайте! Подтвердите свою учетную запись по почте!</div>
      <?php } ?>
  </div>
</div>

