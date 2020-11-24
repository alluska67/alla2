<?php if (isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
<div class="all_news_inside">
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <h3><?=($_SESSION['info'] ?? '');?></h3>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Загрузить</span>
          </div>
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp">>
             <label class="custom-file-label" for="inputGroupFile01">Выберите изображение</label>
          </div>
        </div>
    </div>
    <div>
      Название книги *:
      <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? " "); ?>">
      <?=($errors ['title'] ?? " ");?>
    </div>
    <div>
      Описание книги *:
      <textarea class="news_table" name="description" id="" cols="30" rows="10"><?=htmlspecialchars($_POST['description'] ?? " "); ?></textarea>
      <?=($errors ['description'] ?? " "); ?>
    </div>
    <div>
      Кол-во страниц *:
      <input class="news_table" name="pages" value="<?=(int)($_POST['pages'] ?? " "); ?>">
      <?=($errors ['pages'] ?? " "); ?>
    </div>
    <div>
      Стоимость *:
      <input class="news_table" name="price" value="<?=(float)($_POST['price'] ?? " " );?>">
      <?=($errors ['price'] ?? " "); ?>
    </div>
    <div>
      Автор *:
        <input class="news_table" type="text" name="author" value="<?=htmlspecialchars($_POST['author'] ?? " "); ?>">
        <?=($errors ['author'] ?? " ");?>
    </div>

    <input class="add_bottom" type = "submit" name="add" value="Добавить новость">
  </form>
</div>
    <?php //wtf($_POST,1);?>
<?php } else { ?>
<div>Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта</div>
<?php } ?>
