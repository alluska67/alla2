<div class="all_news_inside">
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <h3 class="total">Фотография автора * :</h3>
      <h3><?=($_SESSION['info'] ?? '');?></h3>
      <?php if(empty($authors_row['img'])) { ?>
        <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
      <?php } else { ?>
        <span><img src="<?='/uploaded/books/'.htmlspecialchars($authors_row['img']); ?>" alt=""></span>
        <span><a href="/admin/books/edit?action=delete_img&id=<?=(int)($authors_row['authors_id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
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
        Имя автора *:
      <input class="news_table" type="text" name="name" value="<?=htmlspecialchars($authors_row['name'] ?? " "); ?>">
      <?=($errors ['name'] ?? " ");?>
    </div>
    <div>
        Краткая биография *:
      <textarea class="news_table" name="biography" id="" cols="30" rows="10"><?=htmlspecialchars($authors_row['biography'] ?? " "); ?></textarea>
      <?=($errors ['biography'] ?? " "); ?>
    </div>
    <div>
        Годы жизни *:
      <input class="news_table" name="years_of_life" value="<?=htmlspecialchars($authors_row['years_of_life'] ?? " "); ?>">
      <?=($errors ['years_of_life'] ?? " "); ?>
    </div>
    <input class="add_bottom" type="submit" name="edit" value="Отредактировать данные об авторе">
  </form>
</div>

