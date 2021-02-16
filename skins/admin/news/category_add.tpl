<?php if (isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
<div class="all_news_inside">
  <div class="row mx-md-n2 div_bottom">
    <p class="col-2">Перечень всех категорий :</p>
      <select name="category" class="table_select">
          <?php while ($choose_category = $choose_news_category->fetch_assoc()) {?>
            <option value="<?=(int)$choose_category['id_cat']?>"><?=htmlspecialchars($choose_category['title_cat']);?></option>
          <?php } ?>
      </select>
  </div>
  <p style="padding-left: 6px">Если необходимо, добавьте НОВУЮ категорию ниже: </p>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row mx-md-n2 div_bottom">
      <p class="col-2">Категория *:</p>
      <input class="news_table" type="text" name="new_category" value="<?=htmlspecialchars($_POST['new_category'] ?? " "); ?>">
      <?=($errors ['new_category'] ?? " ");?>
    </div>
    <input class="add_bottom" type = "submit" name="add" value="Добавить новую категорию">
  </form>
</div>
<?php } else { ?>
<div>Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта</div>
<?php } ?>
