<?php

phpinfo();

  <form action="" method="post">
        <?php while ($category = $news_category->fetch_assoc()) {?>
        <div class="news_button_inside">
          <input type="button" name="news_category" value="<?=$category['title_cat'];?> " placeholder="<?=$category['title_cat'];?> "><br>
        </div>
        <?php } ?>
      </form>