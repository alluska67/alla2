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
      Имя автора *:
      <input class="news_table" type="text" name="name" value="<?=htmlspecialchars($_POST['name'] ?? " "); ?>">
      <?=($errors ['name'] ?? " ");?>
    </div>
    <div>
      Краткая биография *:
      <textarea class="news_table" name="biography" id="" cols="30" rows="10"><?=htmlspecialchars($_POST['biography'] ?? " "); ?></textarea>
      <?=($errors ['biography'] ?? " "); ?>
    </div>
    <div>
      Годы жизни *:
      <input class="news_table" name="years_of_life" value="<?=htmlspecialchars($_POST['years_of_life'] ?? " "); ?>">
      <?=($errors ['years_of_life'] ?? " "); ?>
    </div>

    <input class="add_bottom" type = "submit" name="add" value="Добавить автора">
  </form>
</div>
    <?php //wtf($_POST,1);?>
<?php } else { ?>
<div>Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта</div>
<?php } ?>
