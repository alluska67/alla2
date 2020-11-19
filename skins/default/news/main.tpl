<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
  <div class="all_news_inside">
    <h3><?=$info ?? ''; ?></h3>
  <form action="" method="post" class="select_form">
    <select name="news_category"  class="custom-select col-md-4">
      <option selected disabled>Категория новости</option>
        <?php while ($category = $news_category->fetch_assoc()) { ?>
          <?php if (isset($_POST['news_category']) && $category['id_cat'] == $_POST['news_category']) { ?>
            <option selected value="<?=$category['id_cat']?>"><?=$category['title_cat']?></option>
          <?php } else { ?>
            <option value="<?=$category['id_cat']?>"><?=$category['title_cat']?></option>
          <?php }?>
        <?php } ?>
    </select>
    <input type="submit" class="btn btn-outline-primary" name="submit"" value='Выбрать категорию'>
  </form>
    <h2 class="p-1 mb-2 bg-info text-white  h2_right_news" >Всего новостей : <?=$news->num_rows;?></h2>
    <?php while ($row = $news->fetch_assoc()){ ?>
      <div class="card mb-12 border border-secondary news_content">
        <div class="row no-gutters">
          <div class="col-md-2 img_news ">
            <?php if(empty($row['img'])) { ?>
              <img src="/uploaded/no_image.png" class="card-img " alt="...">
            <?php } else { ?>
                <a href="/news/show?action=show&id=<?=(int)($row['id']); ?>"><span class=""><img src="<?='/uploaded/news/'.htmlspecialchars($row['img']); ?>" class="card-img border border-secondary" alt="..."></span></a>
            <?php } ?>
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <p class="card-text"><small class="p-1 mb-2 bg-info text-white"><?=htmlspecialchars($row['date']) ;?></small></p>
              <a href="/news/show?action=show&id=<?=(int)($row['id']); ?>"><h5 class="card-title text-dark" ><?=htmlspecialchars(mb_strimwidth($row['title'], 0, 100,'...')); ?></h5></a>
              <p class="card-text"><?=htmlspecialchars(mb_strimwidth($row['description'], 0, 200,'...')); ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
<?php } else { ?>
  Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>




