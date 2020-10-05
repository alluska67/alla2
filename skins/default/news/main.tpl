<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
  <div class="all_news_inside">
    <?php if(isset($info)) { ?>
      <h3><?=($info); ?></h3>
    <?php } ?>
    <h2 class="total">Свежие новости:</h2>
    <form action="" method="post">
      <?php while ($row = mysqli_fetch_assoc($news)) { ?>
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



