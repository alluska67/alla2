<!DOCTYPE html>
<html lang="eng" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?=ht(Core::$META['title']); ?></title>
  <meta name="description" content="<?=ht(Core::$META['description']); ?>">
  <meta name="keywords" content="<?=ht(Core::$META['keywords']); ?>">
  <link href="/skins/<?=Core::$SKIN;?>/css/normalize.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="/skins/<?=Core::$SKIN;?>/css/landing.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(count(Core::$CSS)) { echo implode("\n",Core::$CSS); } ?>
    <?php Core::$JS[] = '<script type="text/javascript" src="/skins/default/js/scripts_v1.js"></script>'; ?>
    <?php if(count(Core::$JS)) { echo implode("\n",Core::$JS); } ?>
</head>
<body>
<header>
  <div class="top">
    <div class="container_top clearfix">
      <div class="top_numbers">
        <div class="sprite_telephone">
          <i class="sprite sprite_telephone"></i>
        </div>
        <div class="contact_block_top">
          <span class="text_top">Call</span>
          <span class="telephones">
              <a href="#">+(555) 2346-789,</a>
              <a href="#">+(555) 2346-789</a>
            </span>
        </div>
      </div>
      <div class="top_adress">
        <div class="sprite_clock">
          <i class="sprite sprite_clock"></i>
        </div>
        <span class="text_top2">4578 Marmora Road</span>
      </div>
      <div class="users_cab">
          <?php if(isset($_SESSION['user'])) {?>
            <?php if(empty($_SESSION['user']['avatar'])) { ?>
            <img src="/uploaded/no_image.png" alt="" class="avatar_main">
            <?php } else { ?>
            <img src="<?='/uploaded/avatar/'.htmlspecialchars($_SESSION['user']['avatar']); ?>" class="avatar_main"alt="">
            <?php } ?>
            <p class="near_avatar">Здравствуй, <?=$_SESSION['user']['login']?></p><br>
            <a href="/cab/main_cab" style="font-size: 13px;">Личный кабинет</a>
          <?php } else { ?>
            <p>Здравствуйте, пользователь!</p>
            <div class="auth_block">
              <a href="/cab/registration">  Регистрация</a>
              <?php if($_SERVER['REQUEST_URI'] != '/cab/authorization') { ?>
              <div id="auth_modal" class="auth_text" onclick="hideShow('auth_modal_open');">Авторизироваться  &nbsp</div>
              <div id="auth_modal_open" class="authorization_modal"  style="display: none">
                <div class="authorization_inside">
                  <?php if (!isset($status) || $status != 'Ok') { echo $errors ?? " "; ?>
                    <form action="/cab/authorization" method="post" class="auth_form">

                      Login:<input class="cab_table" type="text" name="login"><br>
                      Pass: <input class="cab_table" type="password" name="password"><br>
                      <input type="hidden" name="uri" value="<?=$_SERVER['REQUEST_URI'];?>" >
                      <input type="checkbox" value="autoauth" name="autoauth" id="autoauth1"><label for="autoauth1">Запомнить меня для автовхода</label><br>
                      <input class="cab_table" type="submit" name="submit" value="Вход">
                    </form>
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
          <?php }?>
      </div>
    </div>
  </div>
  <div class="header_container_transparent">
    <div class="header_container_top clearfix">
      <div class="header_container_top1">
        <div class="contact">
          <i class="sprite sprite-clock-pink"></i>
          <div class="contact_text">
            <span>Mon – Fri: 10AM – 7PM;<br>Sat – Sun: 10AM – 3PM</span>
          </div>
        </div>
        <div class="contact">
          <i class="sprite sprite-location"></i>
          <div class="contact_text">
            <span>4578 Marmora Road,<br>Glasgow</span>
          </div>
        </div>
        <div class="contact1">
          <i class="sprite sprite-telephone_pink"></i>
          <div class="contact_text">
            <span>Call Us:</span><br>
            <span class="telephones2">
                <a href="#">+(555) 2346-789,</a>
                <a href="#">+(555) 2346-789</a>
              </span>
          </div>
        </div>
      </div>
    </div>
    <div class="header_container_bottom">
      <div class="header_container_bottom_inside">
        <div class="logo">
          <a href="/"><img src="/skins/<?=Core::$SKIN; ?>/img/logo.png" alt="logo"></a>
        </div>
        <div class="header_nav clearfix">
          <nav class="main_nav">
            <ul class="incide_nav">
              <li class="line_li">
                <a href="/projects">projects</a>
              </li>
              <li class="line_li_pages">
                <a href="/static/pages">pages<i class="sprite sprite-check_mark"></i></a>
                <ul class="drop_menu_pages">
                  <li class="drop_li_name1">
                    <a href="#">Auxiliary</a>
                    <ul class="drop_menu2">
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Typography</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Maintenance</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">404 Page</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Search Results</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Coming Soon</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">FAQs</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Documentations</a>
                      </li>
                    </ul>
                  </li>
                  <li class="drop_li_name1">
                    <a href="#">Dinamics Pages</a>
                    <ul class="drop_menu2">
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Testimonial</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Team</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Team Member Profile</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Booked Appointment</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Services</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Single Service Page</a>
                      </li>
                    </ul>
                  </li>
                  <li class="drop_li_name1">
                    <a href="#">Headers</a>
                    <ul class="drop_menu2">
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Header Style 1</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Header Style 2</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Header Style 3</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Header Style 4</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Header Style 5</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Header Style 6</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Header Style 7</a>
                      </li>
                    </ul>
                  </li>
                  <li class="drop_li_name1">
                    <a href="#">Footers</a>
                    <ul class="drop_menu2">
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Footer Style 1</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Footer Style 2</a>
                      </li>
                      <li class="drop_li3">
                        <i class="arrow"></i>
                        <a href="#">Footer Style 3</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="game">
                <a href="/game">Game</a>
              </li>
              <li class="files">
                <a href="/files">Files</a>
              </li>
              <li class="comments">
                <a href="/comments">Comments</a>
              </li>
              <li class="news">
                <a href="/authors">Authors</a>
              </li>
              <li class="news">
                <a href="/books">Books</a>
              </li>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
                  <li class="news">
                    <a href="/news">News</a>
                  </li>
                <?php } ?>
              <li class="news">
                <a href="/goods">Goods</a>
              </li>
              <?php if(!isset($_SESSION['user'])) { ?>
                <li class="news">
                  <a href="/cab/authorization">Auth</a>
                </li>
                <li class="news">
                  <a href="/cab/registration">Reg</a>
                </li>
              <?php } else { ?>
                <li class="news">
                  <a href="/cab/exit">Exit</a>
                </li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
  </div>
</header>
<main class="clearfix">
  <div class="<?=$not_main_page;?>">
    <div class="site_content"></div>
  </div>
    <?=$content ; ?>
</main>
<footer class="container_footer">
  <div class="footer_top">
    <div class="footer_top_body clearfix">
      <div class="col_1">
        <p class="text_p5">About</p>
        <p class="text_p6">Impacty is one of the leading companies providing business services for small, medium-sized businesses and large corporations. A lot of clients have already turned to us for help and use our services.</p>
      </div>
      <div class="col_2">
        <p class="text_p5">Services</p>
        <ul class="text_p6">
          <li class="text_li">
            <i class="sprite sprite_arrow_2"></i>
            <a href="#">Business</a>
          </li>
          <li class="text_li">
            <i class="sprite sprite_arrow_2"></i>
            <a href="#">Buying Safe</a>
          </li>
          <li class="text_li">
            <i class="sprite sprite_arrow_2"></i>
            <a href="#">Creating</a>
          </li>
          <li class="text_li">
            <i class="sprite sprite_arrow_2"></i>
            <a href="#">Investment</a>
          </li>
          <li class="text_li">
            <i class="sprite sprite_arrow_2"></i>
            <a href="#">Planning</a>
          </li>
          <li class="text_li">
            <i class="sprite sprite_arrow_2"></i>
            <a href="#">Strategic</a>
          </li>
        </ul>
      </div>
      <div class="col_3">
        <p class="text_p5">Recent Posts</p>
        <div class="post_1">
          <div class="post_1_left">
            <a href="#"><i class="sprite sprite_post"></i></a>
          </div>
          <div class="post_1_right">
            <div class="post_date2">
              <span class="text_p7"><a href="#">April 24,2017</a></span>
              <span class="admin">
                  by
                  <a href="#">admin</a>
                </span>
            </div>
            <div class="company">
              <a href="#">Hedge Funds This Year, Explained</a>
            </div>
          </div>
        </div>
        <div class="post_2">
          <div class="post_2_left">
            <a href="#"><i class="sprite sprite_post2"></i></a>
          </div>
          <div class="post_2_right">
            <div class="post_date2">
              <span class="text_p7"><a href="#">March 13,2017</a></span>
              <span class="admin">
                  by
                  <a href="#">admin</a>
                </span>
            </div>
            <div class="company2">
              <a href="#">Reigniting Growth in Industrials</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col_4">
        <p class="text_p5">Newsletter</p>
        <p class="text_p6">Subscribe to our newsletter to get the latest news, tips, and advice.</p>
        <div class="Email">
          <input type="Email" name="Email" placeholder="Your E-mail">
        </div>
        <div class="submit_button">
          <a href="#"><i class="sprite2 sprite_submit"></i></a>
        </div>
        <div class="follow">
          <p class="text_p5">Follow</p>
          <div class="social">
            <ul class="social_block">
              <li class="icons"><a href="https://www.facebook.com/"><i class="sprite3 sprite_fb"></i></a></li>
              <li class="icons_tw"><a href="https://twitter.com/"><i class="sprite3 sprite_tw"></i></a></li>
              <li class="icons"><a href="https://www.youtube.com/"><i class="sprite3 sprite_y"></i></a></li>
              <li class="icons"><a href="https://www.instagram.com/"><i class="sprite3 sprite_inst"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="footer_bottom_body clearfix">
      <div class="footer_bottom_left">
        <div class="footer_logo">
          <a href="#"><img src="/skins/<?php echo Core::$SKIN; ?>/img/logo.png" alt="Logo"></a>
        </div>
        <p class="privacy">© <?= (Core::$CREATED <= $newDate ? Core::$CREATED : Core::$CREATED . '-' . $newDate); ?>
          Impacty, Inc and Web Templates Ltd. All Rights Reserved.
          <a href="#">Privacy Policy</a>
        </p>
      </div>
      <div class="footer_bottom_right clearfix">
        <ul class="social_block_footer">
          <li class="icons"><a href="https://www.facebook.com/"><i class="sprite3 sprite_ff"></i></a></li>
          <li class="icons_tw"><a href="https://twitter.com/"><i class="sprite3 sprite_tt"></i></a></li>
          <li class="icons"><a href="https://www.youtube.com/"><i class="sprite3 sprite_yy"></i></a></li>
          <li class="icons"><a href="https://www.instagram.com/"><i class="sprite3 sprite_ii"></i></a></li>
        </ul>
      </div>
    </div>
  </div>

  </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>

 
    
