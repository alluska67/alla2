<!DOCTYPE html>
<html lang="eng" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?php echo ht(Core::$META['title']); ?></title>
  <meta name="description" content="<?php echo ht(Core::$META['description']); ?>">
  <meta name="keywords" content="<?php echo ht(Core::$META['keywords']); ?>">
  <link href="/skins/<?php echo Core::$SKIN;?>/css/normalize.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="/skins/<?php echo Core::$SKIN;?>/css/landing.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php if(count(Core::$CSS)) { echo implode("\n",Core::$CSS); } ?>
  <?php if(count(Core::$JS)) { echo implode("\n",Core::$JS); } ?>
</head>
<body>
  <header class="clearfix">
    <div class="top">
      <div class="container_top clearfix">
        <div class="logo">
          <a href="/admin"><img src="/skins/<?php echo Core::$SKIN; ?>/img/logo.png" alt="logo"></a>
        </div>
        <p class="admin_panel">ADMIN PANEL</p>
        <div class="main_page">
          <a href="/">Main user page</a>
            <?php if(isset($_SESSION['user'])) {?>
              <?php if(empty($_SESSION['user']['avatar'])) { ?>
              <img src="/uploaded/no_image.png" alt="" class="avatar_main">
              <?php } else { ?>
              <img src="<?='/uploaded/avatar/'.htmlspecialchars($_SESSION['user']['avatar']); ?>" class="avatar_main"alt="">
              <?php } ?>
              <p class="near_avatar"><?=$_SESSION['user']['login']?></p>
              <a href="/cab/main_cab" style="font-size: 13px;">Личный кабинет</a>
            <?php } else { ?>
              <p>Здравствуйте, пользователь!</p>
              <a href="/cab/authorization">Авторизация</a>
              <a href="/cab/registration">Регистрация</a>
            <?php }?>
        </div>
      </div>
    </div>
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] == 7 ) { ?>
    <div class="header_container_transparent">
      <div class="header_container_bottom">
        <div class="header_container_bottom_inside">
          <div class="header_nav clearfix">
            <nav class="main_nav">
              <ul class="incide_nav">
                <li class="line_li">
                  <a href="/admin/goods">GOODS<i class="sprite sprite-check_mark"></i></a>
                 </li>
                <li class="line_li">
                  <a href="/admin/news">NEWS<i class="sprite sprite-check_mark"></i></a>
                </li>
                <li class="line_li">
                  <a href="/admin/books">BOOKS<i class="sprite sprite-check_mark"></i></a>
                </li>
                <li class="line_li">
                  <a href="/admin/users">Users</a>
                </li>
                <?php if(isset($_SESSION['user'])) { ?>
                  <li class="news">
                    <a href="/admin/users/exit">Exit</a>
                  </li>
                <?php } ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </header>
  <main class="clearfix">
    <div class="main_inside">
      <?php echo $content ; ?>
    </div>
  </main>
  <footer class="container">
    <div class="footer_bottom">
      <div class="footer_bottom_body clearfix">
        <div class="footer_bottom_left">
          <p class="privacy">© <?= (Core::$CREATED <= $newDate ? Core::$CREATED : Core::$CREATED . '-' . $newDate); ?>
            Impacty, Inc and Web Templates Ltd. All Rights Reserved.
            <a href="#">Privacy Policy</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>

 
    
