<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
  <div class="all_news_inside">
    <?=$info ?? '' ;?>

    <span class="add_bottom"><a class="total" href="/admin/news/add">Добавить новость</a></span>
      <form action="" method="post" class="select_form">
          <select name="news_category"  class="custom-select">
              <option selected disabled>Категория новости</option>
              <?php while ($category = $news_category->fetch_assoc()) { ?>
                <?php if (isset($_POST['news_category']) && $category['id_cat'] == $_POST['news_category']) { ?>
                  <option selected value="<?=$category['id_cat']?>"><?=$category['title_cat']?></option>
                <?php } else { ?>
                  <option value="<?=$category['id_cat']?>"><?=$category['title_cat']?></option>
                <?php }?>
              <?php } ?>
          </select>
          <input type="submit" class="add_bottom" name="submit" value='Выбрать категорию'>
      </form>

      <?php if(isset($_POST['news_category']) && $_POST['submit']){ ?>
          <h2 class="total">Всего новостей : <?=$display_category->num_rows;?></h2>
          <?php while ($row = $display_category->fetch_assoc()){ ?>
            <div class="media clearfix" >
              <div class="media_inside">
                <div class="media_date"><?=htmlspecialchars($row['date']) ;?></div>
                <div class="media_title"><?=htmlspecialchars(mb_strimwidth($row['title'], 0, 100,'...')); ?></div>
                <div class="delete_edit">
                    <a href="/admin/news/main?action=delete&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete_icon.png" alt="delete" class="delete_icon"></a>
                    <a href="/admin/news/edit?id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/edit_icon.png" alt="edit" class="edit_icon"></a>
                    <input type="checkbox" name="ids[]" value="<?=(int)($row['id']); ?>">
                </div>
                <div class="media_img">
                  <?php if(empty($row['img'])) { ?>
                    <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
                  <?php } else { ?>
                    <span><a href="/admin/news/show?action=show&id=<?=(int)($row['id']); ?>"><img src="<?='/uploaded/news/'.htmlspecialchars($row['img']); ?>" alt=""></a></span>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="delete_all">
            <input class="delete_bottom" type="submit" name="delete" value="Delete all">
          </div>
      <?} else { ?>
      <div>Выберите категорию новостей</div>
          <?php while ($row = $all_current_news->fetch_assoc()) { ?>
             <div class="media clearfix">
              <div class="media_inside">
                <div class="media_date"><?=htmlspecialchars($row['date']) ;?></div>
                <div class="media_title"><?=htmlspecialchars(mb_strimwidth($row['title'], 0, 100,'...')); ?></div>
                <div class="delete_edit">
                    <a href="/admin/news/main?action=delete&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete_icon.png" alt="delete" class="delete_icon"></a>
                    <a href="/admin/news/edit?id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/edit_icon.png" alt="edit" class="edit_icon"></a>
                    <input type="checkbox" name="ids[]" value="<?=(int)($row['id']); ?>">
                </div>
                <div class="media_img">
                  <?php if(empty($row['img'])) { ?>
                    <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
                  <?php } else { ?>
                    <span><a href="/admin/news/show?action=show&id=<?=(int)($row['id']); ?>"><img src="<?='/uploaded/news/'.htmlspecialchars($row['img']); ?>" alt=""></a></span>
                  <?php } ?>
                </div>
<!--                  <a href="/admin/news/show?action=show&id=--><?//=(int)($row['id']); ?><!--">Читать дальше</a>-->
              </div>
            </div>
          <?php } ?>
          <div class="delete_all">
            <input class="delete_bottom" type="submit" name="delete" value="Delete all">
          </div
      <?}?>
  </div>
<?php } else { ?>
  Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>



