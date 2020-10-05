<div class="all_news_inside">
  <form action="" method="post">
    <div>
      Заголовок новости *:
      <input class="news_table" type="text" name="title" value="<?=htmlspecialchars($row['title']); ?>">
      <?=($errors ['title'] ?? " "); ?>
    </div>
    <div>
      Категория новости *:
      <input class="news_table" type="text" name="category" value="<?=htmlspecialchars($row['category']); ?>">
      <?=($errors ['category'] ?? " "); ?>
    </div>
    <div>
      Описание новости *:
      <textarea class="news_table" name="description" id="" cols="30" rows="10"><?=htmlspecialchars($row['description']); ?></textarea>
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

