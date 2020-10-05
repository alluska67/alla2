<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
  <div class="all_news_inside">
    <?php if(isset($info)) { ?>
      <h3><?php echo $info ;?></h3>
    <?php } ?>
    <span class="add_bottom"><a class="total" href="/admin/news/add">Добавить новость</a></span>
    <h2 class="total">Свежие новости:</h2>
    <form action="" method="post">
      <?php while ($row = mysqli_fetch_assoc($news)) { ?>
        <div class="preview">
          <input class="news_table" type="checkbox" name="ids[]" value="<?=(int)($row['id']); ?>">
          <a href="/admin/news/main?action=delete&id=<?=(int)($row['id']); ?>">Удалить</a>
          <a href="/admin/news/edit?id=<?=(int)($row['id']); ?>">Редактировать</a>
          <strong class="main_name" ><?=htmlspecialchars($row['title']); ?></strong>
          <span><?=htmlspecialchars($row['date']) ;?></span>
        </div>
      <?php } ?>
      <input class="delete_bottom" type="submit" name="delete" value="Удалить выбранные элементы">
    </form>
  </div>
<?php } else { ?>
  Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>



