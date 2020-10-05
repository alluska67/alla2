<div class="add_goods">
  <div class="add_goods_incide" style="padding-top: 20px; padding-bottom: 20px">
    <h3><?=($_SESSION['info'] ?? '');?></h3>
    <form action="" method="post" enctype="multipart/form-data">
      <div>
        <h3 class="total">Изображение* :</h3>
          <?php if(empty($row['img'])) { ?>
            <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
          <?php } else { ?>
            <span><img src="<?='/uploaded/goods/'.htmlspecialchars($row['img']); ?>" alt=""></span>
            <span><a href="/admin/goods/edit?action=delete_img&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete photo" class="delete_icon"></a></span>
          <?php } ?>
        <input type="file" name="file" value="выберите файл" accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp">
        <?=($errors['files'] ?? " " ); ?>
      </div>
      <h3 class="total">Категория товара *:</h3>
      <select class="border_thin" name="category">
        <option value="<?=$row['category']; ?>" ><?=ht($goods_category[$row['category']]); ?></option>
        <?php foreach ($goods_category as $k => $v) { ?>
          <?php if($k == $row['category']) { continue; } ?>
            <option value="<?=(int)($k); ?>"><?=htmlspecialchars($v); ?></option>
        <?php } ?>
      </select>
        <?=($errors['category'] ?? " "); ?>
      <div>
        <h3 class="total">Название товара *:</h3>
        <input class="border_goods" type="text" name="name" value="<?=htmlspecialchars($row['name']); ?>">
        <?=($errors['name'] ?? " " ); ?>
      </div>
      <div>
        <h3 class="total">Код товара *:</h3>
        <input class="border_thin" type="text" name="vendor_code" value="<?=htmlspecialchars($row['vendor_code']); ?>">
        <?=($errors['vendor_code'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Наличие товара *:</h3>
        <select class="border_thin" name="availability">
          <option value="<?=htmlspecialchars($row['availability']); ?>"><?=htmlspecialchars($in_stock[$row['availability']]); ?></option>
            <?php foreach ($in_stock as $k => $v) { ?>
              <?php if($k == $row['availability']) { continue; } ?>
                <option value="<?=(int)($k); ?>" ><?=htmlspecialchars($v); ?></option>
            <?php } ?>
        </select>
        <?=($errors['availability'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Описание товара *:</h3>
        <textarea class="border_fat" name="description"><?=nl2br(htmlspecialchars($row['description'])); ?></textarea>
        <?=($errors ['description'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Цена товара *грн:</h3>
        <input class="border_thin" type="number" step="0.01" name="price" value="<?=(float)($row['price']); ?>">
        <?=($errors ['price'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Инфо о доставке товара *:</h3>
        <textarea class="border_fat" name="delivery"><?=nl2br(htmlspecialchars($row['delivery'])); ?></textarea>
        <?=($errors ['delivery'] ?? " "); ?>
      </div>
      <input class="add_bottom" type="submit" name="add" value="Редактировать товар">
    </form>
  </div>
</div>




