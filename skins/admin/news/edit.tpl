<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
<div class="all_news_inside">
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <h3 class="total">Изображение* :</h3>
      <h3><?=($_SESSION['info'] ?? '');?></h3>
      <?php if(empty($row['img'])) { ?>
        <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
      <?php } else { ?>
        <span><img src="<?='/uploaded/news/'.htmlspecialchars($row['img']); ?>" alt=""></span>
        <span><a href="/admin/news/edit?action=delete_img&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
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
      <?=($errors['files'] ?? " " ); ?>
    </div>
    <div>
      Заголовок новости *:
      <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($row['title']); ?>">
      <?=($errors ['title'] ?? " "); ?>
    </div>
    <div>
      Категория новости *:
        <select class="border_thin" name="category">
          <option value="<?=htmlspecialchars($row['id_cat'])?>"><?=htmlspecialchars($row['title_cat']); ?></option>
            <?php while ($category = $news_category->fetch_assoc()) { ?>
              <?php if($category['title_cat'] == $row['title_cat']) { continue; } ?>
              <option value="<?= (int)$category['id_cat']?>"><?= htmlspecialchars($category['title_cat'])?></option>
            <?php } ?>
        </select>
        <?=($errors ['category'] ?? " "); ?>
    </div>
    <div>
      Автор *:
      <input class="news_table" type="text" name="author" value="<?=htmlspecialchars($row['author']); ?>">
      <?=($errors ['author'] ?? " "); ?>
    </div>
    <div>
      Полный текст новости *:
      <textarea  class="news_table" name="description" id="" cols="30" rows="10"><?=htmlspecialchars($row['description']); ?></textarea>
      <?=($errors ['description'] ?? " "); ?>
    </div>
    <div>
      Полный текст новости *:
      <textarea  class="news_table" name="text" id="" cols="30" rows="10"><?=htmlspecialchars($row['text']); ?></textarea>
      <?=($errors ['text'] ?? " "); ?>
    </div>

    <input class="add_bottom" type="submit" name="edit" value="Отредактировать новость">
  </form>
</div>
<?php } else { ?>
    Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>
