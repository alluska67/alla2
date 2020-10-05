<div class="aside">
  <div class="users_left">
    <h3 class="total"><?=($info ?? ''); ?></h3>
    <h2 class="total">Users:<?=mysqli_num_rows($users); ?></h2>
    <form name="search" method="get" action="">
      <p><input class="border_thin" type="search" name="search" placeholder="Поиск пользователя">
      <input class="border_thin" type="submit" name="submit" value="Найти"></p>
    </form>
    <?php if(isset($_GET['search'],$_GET['submit']) && !empty($_GET['search'])) { ?>
      <div class="search_block">
        <?php while($row1 = mysqli_fetch_assoc($res1)){ $result = ''; ?>
          <p><?=$result = '<a href="/admin/users/edit?id=' .$row1['id'].'">'.$row1['login'] .'</a>'.'<br>';?></p>
        <?php } ?></h3>
      </div>
    <?php }?>
    <form action="" method="post">
      <?php while ($row = mysqli_fetch_assoc($users)) { ?>
        <div class="users_panel">
          <a href="/admin/users/edit?id=<?=(int)($row['id']); ?>"><span class="main_name"><strong><?=htmlspecialchars($row['login']); ?></a></strong></span>
          <a href="/admin/users/main?action=delete&id=<?=(int)($row['id']); ?>">Delete</a>
          <a href="/admin/users/edit?id=<?=(int)($row['id']); ?>">Edit</a>
          </div>
        <?php } ?>
    </form>
  </div>
</div>
<div class="users">
  <div class="users_inside">
    <h3>Управление пользователями</h3>
    <p>
      Условное обозначение пользователей во вкладке active:<br>
      Не активен(0) - незарегистрированный пользователь(email неподтверждён)<br>
      Активен(1) - зарегестрированный пользователь(email подтверждён)<br>
      Бан(3) - заблокированный пользователь<br>
    </p>
    <h3>Управление админами</h3>
    <p>
      Условное обозначение пользователей во вкладке access:<br>
      Админ(7) - активный админ<br>
      Бан Админа(3) - заблокированный админ<br>
    </p>
  </div>
</div>

