<div class="add_goods">
  <div class="add_goods_incide" ">
    <form action="" method="post" enctype="multipart/form-data">
      <div>
        <h3 class="total">Изображение* :</h3>
        <input type="file" name="file" value="выберите файл" accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp"><br>
      </div>
      <div>
        <h3 class="total">Категория товара *:</h3>
        <select class="border_thin" name="category">
          <?php foreach ($goods_category as $k => $v) {?>
            <option value="<?=(int)($k); ?>"><?=htmlspecialchars($v) ;?></option>
          <?php } ?>
        </select>
        <?=($errors['category'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Название товара *:</h3>
        <input class="border_goods" type="text" name="name" value="<?=htmlspecialchars($_POST['name'] ?? " "); ?>">
        <?=($errors['name'] ?? " " ); ?>
      </div>
      <div>
        <h3 class="total">Код товара *:</h3>
        <input class="border_thin" type="text" name="vendor_code" value="<?=htmlspecialchars($_POST['vendor_code'] ?? " "); ?>">
        <?=($errors['vendor_code'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Наличие товара *:</h3>
        <select class="border_thin" name="availability">
          <?php foreach ($in_stock as $k => $v) {?>
            <option value="<?=(int)($k); ?>"><?=htmlspecialchars($v); ?></option>
          <?php } ?>
        </select>
        <?=($errors['availability'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Описание товара *:</h3>
        <textarea class="border_fat" name="description"><?=nl2br(htmlspecialchars($_POST['description'] ?? " ")); ?></textarea>
        <?=($errors ['description'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Цена товара *грн:</h3>
        <input class="border_thin" type="number" step="0.01" name="price" value="<?=(float)($_POST['price'] ?? " "); ?>">
        <?=($errors ['price'] ?? " "); ?>
      </div>
      <div>
        <h3 class="total">Инфо о доставке товара *:</h3>
        <textarea class="border_fat" name="delivery"><?=nl2br(htmlspecialchars($_POST['delivery'] ?? " ")) ; ?></textarea>
        <?=($errors ['delivery'] ?? " "); ?>
      </div>
      <input class="add_bottom" type="submit" name="add" value="Добавить товар">
    </form>
  </div>
</div>

