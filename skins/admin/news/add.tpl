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
            <p class="errors"><?=($errors ['files'] ?? " ");?></p>
        </div>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Заголовок новости *:</p>
        <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? " "); ?>">
        <p class="errors"><?=($errors ['title'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Категория новости *:</p>
        <select name="category" class="table_select">
            <option value="" selected>Выберите категорию</option>
          <?php while ($choose_category = $choose_news_category->fetch_assoc()) {?>
            <option value="<?=(int)$choose_category['id_cat']?>"><?=htmlspecialchars($choose_category['title_cat']);?></option>
          <?php } ?>
        </select>
      <p class="errors"><?=($errors ['title_cat'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Автор *:</p>
        <input class="news_table" type="text" name="author" value="<?=htmlspecialchars($_POST['author'] ?? " "); ?>">
        <p class="errors"><?=($errors ['author'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Описание новости *:</p>
        <textarea class="news_table" name="description" id=""><?=htmlspecialchars($_POST['description'] ?? " "); ?></textarea>
        <p class="errors"><?=($errors ['description'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Полный текст новости *:</p>
        <textarea class="news_table" name="text" id=""><?=htmlspecialchars($_POST['text'] ?? " "); ?></textarea>
        <p class="errors"><?=($errors ['text'] ?? " ");?></p>
    </div>
    <input class="add_bottom" type = "submit" name="add" value="Добавить новость">
  </form>
</div>
<?php } else { ?>
<div>Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта</div>
<?php } ?>
