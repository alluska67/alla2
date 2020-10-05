<div class="add_goods">
  <div class="add_goods_incide" style="padding-top: 20px; padding-bottom: 20px">
    <form action="" method="post">
      <div>
        <h3 class="total">Login :</h3>
        <input class="border_goods" type="text" name="login" value="<?=htmlspecialchars($row['login']); ?>">
        <?=($errors['login'] ?? " " ); ?>
      </div>
      <div>
        <h3 class="total">Password :</h3>
        <input class="border_thin" type="password" name="password" value="">
        <?=($errors['password'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Права доступа: </h3>
        <div class="border_thin" name="category">
          <?php foreach ($active_category as $k => $v) { ?>
            <?php if($k == $row['active']) {  ?>
              <label><input class="border_thin" type="radio" name="active" checked value="<?=(int)($k); ?> "><?=htmlspecialchars($v); ?></label>
              <?php continue; } else { ?>
              <label><input class="border_thin" type="radio" name="active"  value="<?=(int)($k); ?> "><?=htmlspecialchars($v); ?></label>
            <?php } ?>
          <?php } ?>
        </div>
        <div class="border_thin" name="category">
          <?php foreach ($admin_category as $k => $v) { ?>
            <?php if($k == $row['access']) {  ?>
              <label><input class="border_thin" type="radio" name="access" checked value="<?=(int)($k); ?> "><?=htmlspecialchars($v); ?></label>
               <?php continue; } else { ?>
               <label><input class="border_thin" type="radio" name="access"  value="<?=(int)($k); ?> "><?=htmlspecialchars($v); ?></label>
               <?php } ?>
             <?php } ?>
        </div>
          <?=($errors['active'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Email:</h3>
        <input class="border_thin" type="text" name="email" value="<?=htmlspecialchars($row['email']); ?>">
          <?=($errors['email'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Дата создания:</h3>
        <span ><?=htmlspecialchars($row['date']); ?></span>
          <?=($errors['date'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Последняя активность:</h3>
        <span><?=htmlspecialchars($row['date_edited']); ?></span>
         <?=($errors['date_edited'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">IP :</h3>
        <span><?=htmlspecialchars($row['ip']); ?></span>
          <?=($errors['ip'] ?? " "); ?>
      </div>
      <input class="add_bottom" type="submit" name="edit" value="edit">
      <a href="/admin/users/main?action=delete&id=<?=(int)($row['id']); ?>">Delete</a>
    </form>
  </div>
</div>




