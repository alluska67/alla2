<?php if (isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
<div class="all_news_inside">
  <form action="" method="post">
    <div>
      Заголовок новости *:
      <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? " "); ?>">
      <?=($errors ['title'] ?? " ");?>
    </div>
    <div>
      Категория новости *:
      <input class="news_table" type="text" name="category" value="<?=htmlspecialchars($_POST['category'] ?? " "); ?>">
      <?=($errors ['category'] ?? " ");?>
    </div>
    <div>
      Описание новости *:
      <textarea class="news_table" name="description" id="" cols="30" rows="10"><?=htmlspecialchars($_POST['description'] ?? " "); ?></textarea>
      <?=($errors ['description'] ?? " "); ?>
    </div>
    <div>
      Полный текст новости *:
      <textarea class="news_table" name="text" id="" cols="30" rows="10"><?=htmlspecialchars($_POST['text'] ?? " "); ?></textarea>
      <?=($errors ['text'] ?? " "); ?>
    </div>
    <input class="add_bottom" type = "submit" name="add" value="Добавить новость">
  </form>
</div>
<?php } else { ?>
<div>Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта</div>
<?php } ?>
