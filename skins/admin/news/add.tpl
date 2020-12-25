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
      Заголовок новости *:
      <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? " "); ?>">
      <?=($errors ['title'] ?? " ");?>
    </div>
    <div>
      Категория новости *:
        <select name="category">
          <?php while ($choose_category = $choose_news_category->fetch_assoc()) {?>
            <option value="<?=(int)$choose_category['id_cat']?>"><?=htmlspecialchars($choose_category['title_cat']);?></option>
          <?php } ?>
        </select>
      <?=($errors ['title_cat'] ?? " ");?>
    </div>
    <div>
      Автор *:
        <input class="news_table" type="text" name="author" value="<?=htmlspecialchars($_POST['author'] ?? " "); ?>">
        <?=($errors ['author'] ?? " ");?>
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
