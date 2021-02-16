<?php if (isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
<div class="all_news_inside">
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <h3><?=($_SESSION['info'] ?? '');?></h3>
        <div class="input-group mb-3 add_img">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01"></span>
          </div>
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp">>
             <label class="custom-file-label" for="inputGroupFile01">Выберите изображение</label>
          </div>
        </div>
        <p class="errors"><?=($errors ['file'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Имя автора *:</p>
      <div class="col-2"><input class="news_table" type="text" name="name" value="<?=htmlspecialchars($_POST['name'] ?? " "); ?>"></div>
      <p class="errors"><?=($errors ['name'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2">
      <p class="col-2">Краткая биография *:</p>
      <div class="col-2"><textarea class="news_table" name="biography" id=""><?=htmlspecialchars($_POST['biography'] ?? " "); ?></textarea></div>
        <p class="errors"><?=($errors ['biography'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2">
      <p class="col-2">Год рождения *:</p>
      <div class="col-2"><input class="news_table" name="years" value="<?=htmlspecialchars($_POST['years'] ?? " ");?>"></div>
        <p class="errors"><?=($errors ['years'] ?? " ");?></p>
    </div>
    <input class="add_bottom" type = "submit" name="add" value="Добавить автора">
  </form>
</div>
<?php } else { ?>
<div>Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта</div>
<?php } ?>
