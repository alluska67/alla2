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
    <div class="row mx-md-n2">
      <p class="col-2">Название книги *:</p>
      <div class="col-2"><input class="news_table" type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? " "); ?>"></div>
      <?=($errors ['title'] ?? " ");?>
    </div>
    <div class="row mx-md-n2">
      <p class="col-2">Описание книги *:</p>
      <div class="col-2"><textarea class="news_table" name="description" id="" cols="30" rows="10"><?=htmlspecialchars($_POST['description'] ?? " "); ?></textarea></div>
      <?=($errors ['description'] ?? " "); ?>
    </div>
    <div class="row mx-md-n2">
      <p class="col-2">Кол-во страниц *:</p>
        <div class="col-2"><input class="news_table" type="number" name="pages" value="<?=(int)($_POST['pages'] ?? " "); ?>"></div>
      <?=($errors ['pages'] ?? " "); ?>
    </div>
    <div class="row mx-md-n2">
      <p class="col-2">Стоимость *:</p>
        <div class="col-2"><input class="news_table" type="number" name="price" value="<?=(float)($_POST['price'] ?? " " );?>"></div>
      <?=($errors ['price'] ?? " "); ?>
    </div>
    <div class="row mx-md-n2">
      <p class="col-2">Автор *:</p>
      <select multiple name="author[]" class="news_table">
          <option value="" selected>Выберите авторов</option>
            <?php foreach ($choose_author as $author_name['authors_id'] =>$author_name['name']) { //wtf($choose_author);?>
              <?php if($author_name['authors_id'] == htmlspecialchars($author['id'])) { continue; } ?>
                <option value="<?=(int)$author_name['authors_id']?>"><?=htmlspecialchars($author_name['name']);?></option>
            <?php } ?>
      </select>
    </div>
    <input class="add_bottom" type = "submit" name="add" value="Добавить новость">
  </form>
  </div>
<?php } else { ?>
  <div>Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта</div>
<?php } ?>
