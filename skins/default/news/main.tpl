<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
  <div class="all_news_inside">
      <h3><?=$info ?? ''; ?></h3>
    <h2 class="total">Свежие новости:</h2>
    <form action="" method="post">
      <?php while ($row = $news->fetch_assoc()) { ?>
        <div class="preview">
          <strong class="main_name" ><?=htmlspecialchars($row['title']); ?></strong>
          <span><?=htmlspecialchars($row['date']); ?></span>
        </div>
      <?php } ?>
    </form>
  </div>
<?php } else { ?>
  Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>

<?php if(isset($_POST['news_category']) && $_POST['submit']){ ?>
<h2 class="total">Всего новостей : <?=$display_category->num_rows;?></h2>
<?php while ($row = $display_category->fetch_assoc()){ ?>
    <div class="media">
        <div class="media_inside">
            <div class="media_date"><?=htmlspecialchars($row['date']) ;?></div>
            <div class="media_title"><?=htmlspecialchars($row['title']); ?></div>
            <div class="media_description"><?=htmlspecialchars($row['description']); ?></div>

            <div class="media_img">
                <?php if(empty($row['img'])) { ?>
                    <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
                <?php } else { ?>
                    <span><a href="/admin/news/show?action=show&id=<?=(int)($row['id']); ?>"><img src="<?='/uploaded/news/'.htmlspecialchars($row['img']); ?>" alt=""></a></span>
                    <span><a href="/admin/news?action=delete_img&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
                <?php } ?>
            </div>
            <a href="/admin/news/show?action=show&id=<?=(int)($row['id']); ?>">Читать дальше</a>
            <a href="/admin/news/main?action=delete&id=<?=(int)($row['id']); ?>">Удалить</a>
            <a href="/admin/news/edit?id=<?=(int)($row['id']); ?>">Редактировать</a>
        </div>
    </div>
    <?php } ?>
<?php } ?>



