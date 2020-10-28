<div class="goods">
  <div class="goods_incide" style="padding-top: 20px; padding-bottom: 20px">
    <h3 class="total"><?=($info ?? ''); ?></h3>
    <h2 class="total">Информация о Вас:</h2>
      <?php if ($_SESSION['user']) {
        $row = $users->fetch_assoc();
        $users->close();
      ?>
        <div class="preview_user">
          <div class="users_inside">
            <span class="main_name"><strong><?=htmlspecialchars($row['login']); ?></strong></span><br>
            <span>Возраст: <?=(int)($row['age']); ?> </span><br>
            <span>Имя: <?=htmlspecialchars($row['name']); ?></span><br>
            <span>Фамилия: <?=htmlspecialchars($row['last_name']); ?></span><br>
            <span>Страна: <?=htmlspecialchars($row['country']); ?></span><br>
            <span>Инстаграм: <?=htmlspecialchars($row['instagram']); ?></span><br>
            <span>Email: <?=htmlspecialchars($row['email']); ?></span><br>
            <a href="/cab/main_cab?action=delete&id=<?=(int)($row['id']); ?>">Удалить</a>
            <a href="/cab/edit?id=<?=(int)($row['id']); ?>">Редактировать</a>
          </div>
          <div class="avatar">
            <?php if(empty($row['avatar'])) { ?>
              <img src="/uploaded/no_image.png" alt="" class="no_image">
            <?php } else { ?>
              <img src="<?='/uploaded/avatar/'.htmlspecialchars($row['avatar']); ?>" alt="">
            <?php } ?>
          </div>
        </div>
      <?php } ?>
  </div>
</div>
