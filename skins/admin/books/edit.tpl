<div class="all_news_inside">
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <h3 class="total">Изображение* :</h3>
      <h3><?=($_SESSION['info'] ?? '');?></h3>
      <?php if(empty($book['img'])) { ?>
        <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
      <?php } else { ?>
        <span class="top_img"><img src="<?='/uploaded/books/'.htmlspecialchars($book['img']); ?>" alt=""></span>
        <span><a href="/admin/books/edit?action=delete_img&id=<?=(int)($book['books_id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
      <?php } ?>
        <div class="input-group mb-3 add_img">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01"></span>
          </div>
          <div class="custom-file">
             <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp">>
             <label class="custom-file-label" for="inputGroupFile01">Выберите изображение</label>
          </div>
        </div>
        <p class="errors"><?=($errors ['files'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Название книги *:</p>
      <div class="col-2"><input class="news_table" type="text" name="title" value="<?=htmlspecialchars($book['title'] ?? " "); ?>"></div>
      <p class="errors"><?=($errors ['title'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2">
      <p class="col-2">Описание книги *:</p>
      <div class="col-2"><textarea class="news_table" name="description" id="" cols="30" rows="10"><?=htmlspecialchars($book['description'] ?? " "); ?></textarea></div>
      <p class="errors"><?=($errors ['description'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Кол-во страниц *:</p>
      <div class="col-2"><input class="news_table" type="number" name="pages" value="<?=(int)($book['pages'] ?? " "); ?>"></div>
      <p class="errors"><?=($errors ['pages'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Стоимость *:</p>
      <div class="col-2"><input class="news_table" type="number" name="price" value="<?=(float)($book['price'] ?? " " );?>"></div>
      <p class="errors"><?=($errors ['price'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Автор *:</p>
      <select multiple name="author[]" class="news_table_select">
        <?php foreach ($book['author'] as $author) {;?>
        <option value="<?=htmlspecialchars($author['id'])?>" selected><?=htmlspecialchars($author['name']); ?></option>
          <?php foreach ($choose_author as $author_name['authors_id'] =>$author_name['name']) { //wtf($choose_author);?>
            <?php if($author_name['authors_id'] == htmlspecialchars($author['id'])) { continue; } ?>
              <option value="<?=(int)$author_name['authors_id']?>"><?=htmlspecialchars($author_name['name']);?></option>
          <?php } ?>
        <?php } ?>
      </select>
    </div>
    <input class="add_bottom" type="submit" name="edit" value="Отредактировать книгу">
  </form>
</div>
