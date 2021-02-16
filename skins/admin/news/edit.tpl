<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
<div class="all_news_inside">
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <h3 class="total">Изображение* :</h3>
      <h3><?=($_SESSION['info'] ?? '');?></h3>
      <?php if(empty($row['img'])) { ?>
        <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
      <?php } else { ?>
        <span class="top_img"><img src="<?='/uploaded/news/'.htmlspecialchars($row['img']); ?>" alt=""></span>
        <span><a href="/admin/news/edit?action=delete_img&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
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
      <p class="col-2">Заголовок новости *:</p>
      <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($row['title']); ?>">
      <p class="errors"><?=($errors ['title'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Категория новости *:</p>
        <select class="border_thin table_select" name="category">
          <option value="<?=htmlspecialchars($row['id_cat'])?>"><?=htmlspecialchars($row['title_cat']); ?></option>
            <?php while ($category = $news_category->fetch_assoc()) { ?>
              <?php if($category['title_cat'] == $row['title_cat']) { continue; } ?>
              <option value="<?= (int)$category['id_cat']?>"><?= htmlspecialchars($category['title_cat'])?></option>
            <?php } ?>
        </select>
        <p class="errors"><?=($errors ['category'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Автор *:</p>
      <input class="news_table" type="text" name="author" value="<?=htmlspecialchars($row['author']); ?>">
        <p class="errors"><?=($errors ['author'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Описание новости *:</p>
      <textarea  class="news_table" name="description" id=""><?=htmlspecialchars($row['description']); ?></textarea>
        <p class="errors"><?=($errors ['description'] ?? " ");?></p>
    </div>
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Полный текст новости *:</p>
      <textarea  class="news_table" name="text" id=""><?=htmlspecialchars($row['text']); ?></textarea>
        <p class="errors"><?=($errors ['text'] ?? " ");?></p>
    </div>
    <input class="add_bottom" type="submit" name="edit" value="Отредактировать новость">
  </form>
</div>
<?php } else { ?>
    Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>
