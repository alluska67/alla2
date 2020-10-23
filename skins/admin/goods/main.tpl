<script type="text/javascript" src="/skins/default/js/scripts_v1.js"></script>
<div class="goods">
  <div class="goods_incide" style="padding-top: 20px; padding-bottom: 20px">
  <?php if(isset($info)) { ?>
    <h3 class="total"><?php echo $info ;?></h3>
  <?php } ?>
    <a href="/admin/goods/add"><span class="add_bottom">Добавить товар</span></a>
    <h2 class="total">Существующие товары:</h2>
    <form action="" method="post">
      <?php while ($row = mysqli_fetch_assoc($goods)) { ?>
        <div class="preview">
          <div>
            <input type="checkbox" name="ids[]" value="<?=(int)($row['id']); ?>">
            <a href="/admin/goods/main?action=delete&id=<?=(int)($row['id']); ?>" id="delete_goods" onclick="areYouSure();">Удалить</a>

            <a href="/admin/goods/edit?id=<?=(int)($row['id']); ?>" onclick="areYouSure('delete_goods')">Редактировать</a>


            <span class="main_name"><strong><?=htmlspecialchars($row['category']); ?></strong></span>
            <span class="main_name"><strong><?=htmlspecialchars($row['name']); ?></strong></span>
            <span><?=(float)($row['price']); ?> грн</span>
            <?php if(empty($row['img'])) { ?>
              <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
            <?php } else { ?>
              <span><img src="<?='/uploaded/goods/'.htmlspecialchars($row['img']); ?>" alt=""></span>
              <span><a href="/admin/goods?action=delete_img&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
            <?php } ?>

          </div>
        </div>
      <?php } ?>
      <input class="delete_bottom" type="submit" name="delete" value="Удалить выбранные товары">
    </form>
  </div>
</div>
