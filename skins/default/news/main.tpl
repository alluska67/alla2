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



