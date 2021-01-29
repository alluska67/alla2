<?php if (isset($_SESSION['user'])) { ?>
  <?php if (!isset($_SESSION['commentok'])) { ?>
  <div class="comments_block">
    <div id="ajax"></div>
    <div id="ajax2"></div>
    <div class="comments_inside">
      <h3 class="total">Добавить комментарий</h3>
      <form id="comment_form" action="" method="POST" class="form_content">
        <table class="comments_table">
          <tr>
            <td>Имя *</td>
            <td><input id="comment_name" class="add_comment" type="text" name="name" value="<?=htmlspecialchars($_POST['name'] ?? ' '); ?>"></td>
            <td class="error"><?=($errors['name'] ?? ' '); ?></td>
          </tr>
          <tr>
            <td>Email *</td>
            <td><input id="comment_email" class="add_comment" type="email" name="email" value="<?=htmlspecialchars($_POST['email'] ?? " "); ?>"></td>
            <td class="error"><?=($errors['email'] ?? ' '); ?></td>
          </tr>
          <tr>
            <td>Ваш комментарий *</td>
            <td><textarea id="comment_text" class="add_comment" name="text"><?=htmlspecialchars($_POST['text'] ?? ' '); ?></textarea></td>
            <td class="error"><?=($errors['text'] ?? ' '); ?></td>
          </tr>
        </table>
        <input id="comment_submit" class="add_comment" type="submit" name="send" "   value="Добавить комментарий">
        <p class="text_top"> * - обязательное поле к заполнению</p>
      </form>
        <?php } else { unset($_SESSION['commentok']) ?>
      <p>Вы успешно добавили комментарий</p>
  <?php } ?>
<?php } else { ?>
  <div class="comments_inside">
    Добавлять комментарии могут только авторизированные пользователи. Для авторизации <a href="/index.php?module=cab&page=authorization">нажмите сюда</a>
  </div>
<?php  } ?>
<!--  <h2 class="total">Total comments : --><?//=$result->num_rows; ?><!--</h2>-->
  <div class="comments_top">

<!--    --><?php //if($result->num_rows) { ?>
<!--     --><?php //while ($row = $result->fetch_assoc()) { ?>
<!--      <div class="comments_top_incide">-->
<!--        <div class="top_name_date">-->
<!--          <div class="comment_name">--><?//=htmlspecialchars($row['name']); ?><!--</div>-->
<!--          <div class="comment_date">--><?//=htmlspecialchars($row['date']); ?><!--</div>-->
<!--          <div class="comments_text">-->
<!--            <p class="comments_text_incide">--><?//= ' '.nl2br(htmlspecialchars($row['text'])) . ' '; ?><!--</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--     --><?php //} ?>
<!--    </div>-->
<!--    --><?php //} else { ?>
<!--    'Комментарии отсутствуют';-->
<!--    --><?php //} ?>
<!--  </div>-->
<!--  <nav class="aaa" aria-label="Page navigation example">-->
<!--      --><?//=Paginator::nav($uri);?>
<!--  </nav>-->
</div>



