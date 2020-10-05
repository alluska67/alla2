<div class="goods">
  <div class="goods_incide" style="padding-top: 20px; padding-bottom: 20px">
  <?php if(isset($info)) { ?>
    <h3 class="total"><?=($info); ?></h3>
  <?php } ?>
    <h2 class="total">Существующие товары:</h2>
    <form action="" method="post">
      <?php while ($row = mysqli_fetch_assoc($goods)) { ?>
        <div class="preview">
          <div>
            <span class="main_name"><strong><?=htmlspecialchars($row['name']); ?></strong></span>
            <span>Цена: <?=(float)($row['price']); ?> грн</span>
            <span>Код товара: <?=htmlspecialchars($row['vendor_code']); ?></span>
            <?php if(empty($row['img'])) { ?>
              <img src="/uploaded/no_image.png" alt="" class="no_image"><br>
            <?php } else { ?>
              <img src="<?='/uploaded/goods/'.htmlspecialchars($row['img']); ?>" alt=""><br>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </form>
  </div>
</div>
