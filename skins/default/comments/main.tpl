<?php if (isset($_SESSION['user'])) { ?>
  <div class="comments_block">

    <div id="ajax"></div>
    <div id="ajax2"></div>
    <div class="comments_inside">
      <h3 class="total" >Добавить комментарий</h3>
      <form id="comment_form" action="" method="post" class="form_content" style="display: block" >
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
        <a href=" index.php?module=cab&page=activate&id='<?=$id;?>'&hash='<?=$hash;?>'?>">Lalala</a>
<?php } else { ?>
  <div class="comments_inside">
    Добавлять комментарии могут только авторизированные пользователи. Для авторизации <a href="/index.php?module=cab&page=authorization">нажмите сюда</a>
  </div>
<?php  } ?>
  <div class="comments_top">

</div>



