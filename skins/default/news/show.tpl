<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
  <div class="all_news_inside">
    <h3><?=$info ?? ''; ?></h3>
  <?php if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'show') { ?>
    <?php while ($row = $show_news->fetch_assoc()){ ?>
      <div class="card">
        <div class="card-body">
          <h2 class="card-title title_news p-3 mb-2 bg-info text-white"><?=htmlspecialchars($row['title']); ?></h2>
          <?php if(empty($row['img'])) { ?>
            <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
          <?php } else { ?>
            <img src="<?='/uploaded/news/'.htmlspecialchars($row['img_original']); ?>" class="card-img border border-secondary" style="width: 400px">
          <?php } ?>
          <p class="card-text text_news"><?=htmlspecialchars($row['text']); ?></p>
          <p class="card-text"><small class="text-muted">Дата создания: <?=htmlspecialchars($row['date']) ;?></small></p>
          <p class="card-text"><small class="text-muted">Автор: <?=htmlspecialchars($row['author']) ;?></small></p><br>
          <? if (isset($_GET['news_category'])) {?>
            <p><a href="/news?news_category=<?=$_GET['news_category'];?>&submit=search" class="p-3 mb-2 bg-secondary text-white">Вернуться к новостям</a></p>
          <?}else {?>
            <p><a href="/news" class="p-3 mb-2 bg-secondary text-white">Вернуться ко всем новостям</a></p>

          <?}?>
        </div>
      </div>
    <?php } ?>
  <?php } ?>
<?php } else { ?>
    Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>
