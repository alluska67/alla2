<div class="add_goods">
  <div class="add_goods_incide" style="padding-top: 20px; padding-bottom: 20px">
    <h3 class="total"><?=($_SESSION['info'] ?? ''); ?></h3>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="avatar_edit">
        <h3 class="total">Avatar* :</h3>
          <?php if(empty($row['avatar'])) { ?>
            <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
          <?php } else { ?>
            <span><img src="<?='/uploaded/avatar/'.htmlspecialchars($row['avatar']); ?>" alt=""></span>
            <span><a href="./edit?action=delete_img&id=<?=(int)($row['id']); ?>"><img src="/skins/default/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
          <?php } ?>
        <input type="file" name="file" value="выберите файл" accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp"><br>
      </div>
      <div>
        <h3 class="total">Login :</h3>
        <span class="border_goods" type="text"><?=htmlspecialchars($row['login']); ?></span>
        <?=($errors['login'] ?? " " ); ?>
      </div>
      <div>
        <h3 class="total">Имя* :</h3>
        <input class="border_thin" type="text" name="name" value="<?=htmlspecialchars($row['name']); ?>">
          <?=($errors['name'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Фамилия* :</h3>
        <input class="border_thin" type="text" name="last_name" value="<?=htmlspecialchars($row['last_name']); ?>">
          <?=($errors['last_name'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Возраст* :</h3>
        <input class="border_thin" type="text" name="age" value="<?=htmlspecialchars($row['age']); ?>">
          <?=($errors['age'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Страна* :</h3>
        <input class="border_thin" type="text" name="country" value="<?=htmlspecialchars($row['country']); ?>">
          <?=($errors['country'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Password* :</h3>
        <input class="border_thin" type="password" name="password" value="">
        <?=($errors['password'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Email* :</h3>
        <input class="border_thin" type="text" name="email" value="<?=htmlspecialchars($row['email']); ?>">
          <?=($errors['email'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Instagram:</h3>
        <input class="border_thin" type="text" name="instagram" value="<?=htmlspecialchars($row['instagram']); ?>">
          <?=($errors['instagram'] ?? " "); ?>
      </div>
      <input class="add_bottom" type="submit" name="edit" value="edit">
      <a href="/admin/users/main?action=delete&id=<?=(int)($row['id']); ?>">Delete</a>
    </form>
  </div>
</div>




