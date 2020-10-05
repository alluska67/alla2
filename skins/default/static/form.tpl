<form action="/index.php?page=form" method="post" style="width: min-content" >
  <input type="text" name="login" placeholder="login">
  <input type="password" name="password" placeholder="password">
  <input type="email" name="email" placeholder="email">
  <input type="submit" name="submit"><br>
  <?php if(isset($error)){echo $error ;}?>
</form>
























