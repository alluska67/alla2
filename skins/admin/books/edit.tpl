<div class="all_news_inside">
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <h3 class="total">Изображение* :</h3>
      <h3><?=($_SESSION['info'] ?? '');?></h3>
      <?php if(empty($book['img'])) { ?>
        <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
      <?php } else { ?>
        <span><img src="<?='/uploaded/books/'.htmlspecialchars($book['img']); ?>" alt=""></span>
        <span><a href="/admin/books/edit?action=delete_img&id=<?=(int)($book['books_id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
      <?php } ?>
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
      <?=($errors['files'] ?? " " ); ?>
    <div>
      Название книги *:
      <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($book['title'] ?? " "); ?>">
      <?=($errors ['title'] ?? " ");?>
    </div>
    <div>
      Описание книги *:
      <textarea class="news_table" name="description" id="" cols="30" rows="10"><?=htmlspecialchars($book['description'] ?? " "); ?></textarea>
      <?=($errors ['description'] ?? " "); ?>
    </div>
    <div>
      Кол-во страниц *:
      <input class="news_table" name="pages" value="<?=(int)($book['pages'] ?? " "); ?>">
      <?=($errors ['pages'] ?? " "); ?>
    </div>
    <div>
      Стоимость *:
      <input class="news_table" name="price" value="<?=(float)($book['price'] ?? " " );?>">
      <?=($errors ['price'] ?? " "); ?>
    </div>
    <div>
      Автор *:
      <input class="news_table" type="text" name="author" value="<?=htmlspecialchars($author ?? " "); ?>">
      <?=($errors ['author'] ?? " ");?>
    </div>

    <input class="add_bottom" type="submit" name="edit" value="Отредактировать новость">
  </form>
</div>

