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
  <link href="/skins/<?php echo Core::$SKIN;?>/css/landing.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(count(Core::$CSS)) { echo implode("\n",Core::$CSS); } ?>
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
            <a href="/cab/authorization">Авторизация</a>
            <a href="/cab/registration">Регистрация</a>
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
          <a href="/"><img src="/skins/<?php echo Core::$SKIN; ?>/img/logo.png" alt="logo"></a>
        </div>
        <div class="header_nav clearfix">
          <nav class="main_nav">
            <ul class="incide_nav">
              <li class="line_li">
                <a href="/static/about">about</a>
              </li>
              <li class="line_li_services">
                <a href="/static/services">services<i class="sprite sprite-check_mark"></i></a>
                <ul class="drop_menu_services">
                  <li class="drop_li">
                    <i class="arrow"></i>
                    <a href="#">Investment</a>
                  </li>
                  <li class="drop_li">
                    <i class="arrow"></i>
                    <a href="#">Exit Planning</a>
                  </li>
                  <li class="drop_li">
                    <i class="arrow"></i>
                    <a href="#">Business Planning</a>
                  </li>
                  <li class="drop_li">
                    <i class="arrow"></i>
                    <a href="#">Property</a>
                  </li>
                  <li class="drop_li">
                    <i class="arrow"></i>
                    <a href="#">M&A</a>
                  </li>
                  <li class="drop_li">
                    <i class="arrow"></i>
                    <a href="#">Market Research</a>
                  </li>
                </ul>
              </li>
              <li class="line_li">
                <a href="/static/projects">projects</a>
              </li>
              <!--                <li class="line_li_blog">-->
              <!--                  <a href="/static/blog">blog<i class="sprite sprite-check_mark"></i></a>-->
              <!--                  <ul class="drop_menu_blog">-->
              <!--                    <li class="drop_li_name">-->
              <!--                      <a href="#">blog layouts</a>-->
              <!--                      <ul class="drop_menu2">-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Classic</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Modern Listing</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Grid</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Masonry</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Justify</a>-->
              <!--                        </li>-->
              <!--                      </ul>-->
              <!--                    </li>-->
              <!--                    <li class="drop_li_name">-->
              <!--                      <a href="/">post formats</a>-->
              <!--                      <ul class="drop_menu2">-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Standart</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Image Format</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Gallery Format</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Quote Format</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Link Format</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Video Format</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Audio Format</a>-->
              <!--                        </li>-->
              <!--                      </ul>-->
              <!--                    </li>-->
              <!--                    <li class="drop_li_name">-->
              <!--                      <a href="/">Sidebar</a>-->
              <!--                      <ul class="drop_menu2">-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Left Sidebar</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">Right Sidebar </a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="/">No Sidebar</a>-->
              <!--                        </li>-->
              <!--                      </ul>-->
              <!--                    </li>-->
              <!--                  </ul>-->
              <!--                </li>-->

              <!--                <li class="line_li_features">-->
              <!--                  <a href="/static/features">features<i class="sprite sprite-check_mark"></i></a>-->
              <!--                  <ul class="drop_menu_features">-->
              <!--                    <li class="drop_li_name">-->
              <!--                      <a href="#">General</a>-->
              <!--                      <ul class="drop_menu2">-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Careers</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Pricing</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Clients</a>-->
              <!--                        </li>-->
              <!--                      </ul>-->
              <!--                    </li>-->
              <!--                    <li class="drop_li_name">-->
              <!--                      <a href="#">Elements 2</a>-->
              <!--                      <ul class="drop_menu2">-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Pricing Table</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Slider</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Tabs</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Text</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Toggles</a>-->
              <!--                        </li>-->
              <!--                      </ul>-->
              <!--                    </li>-->
              <!--                    <li class="drop_li_name">-->
              <!--                      <a href="#">Elements</a>-->
              <!--                      <ul class="drop_menu2">-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Animated Counter</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Audio</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Call To Action</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Contact Forms</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Images</a>-->
              <!--                        </li>-->
              <!--                        <li class="drop_li2">-->
              <!--                          <i class="arrow"></i>-->
              <!--                          <a href="#">Maps</a>-->
              <!--                        </li>-->
              <!--                      </ul>-->
              <!--                    </li>-->
              <!--                  </ul>-->
              <!--                </li>-->
              <!--                <li class="line_li">-->
              <!--                  <a href="index.php?module=static&page=contacts">contacts</a>-->
              <!--                </li>-->
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
              <!--                --><?php //if($_SERVER['REMOTE_ADDR'] == '127.0.0.1' && !isset($_COOKIE['access'])) { ?>
              <!--                <li class="administrator">-->
              <!--                  <a href="/static/form">Sign in</a>-->
              <!--                </li>-->
              <!--                --><?php //} elseif (isset($_COOKIE['access']) && $_COOKIE['access'] == '1') { ?>
              <!--                <li class="administrator">-->
              <!--                  <a href="/static/admin">Admin</a>-->
              <!--                </li>-->
              <!--                <li class="exit">-->
              <!--                  <a href="/static/exit">Exit</a>-->
              <!--                </li>-->
              <!--                --><?php //} ?>
              <li class="game">
                <a href="/game/main">Game</a>
              </li>
              <li class="files">
                <a href="/files/main">Files</a>
              </li>
              <li class="comments">
                <a href="/comments/main">Comments</a>
              </li>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
                  <li class="news">
                    <a href="/news/main">News</a>
                  </li>
                <?php } ?>
              <li class="news">
                <a href="/goods/main">Goods</a>
              </li>
              <li class="news">
                <a href="/cab/registration">Reg</a>
              </li>
              <li class="news">
                <a href="/cab/authorization">Auth</a>
              </li>
                <?php if(isset($_SESSION['user'])) { ?>
                  <li class="news">
                    <a href="/cab/exit">Exit</a>
                  </li>
                <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
      <div class="block_search">
        <div class="search_inside">
          <span class="search"><a class="sprite sprite-loupe2"></a></span>
          <input type="search" id="search"/>
        </div>
      </div>
    </div>
  </div>
</header>
<main class="clearfix">
  <div class="<?=$not_main_page;?>">
    <div class="site_content"></div>
  </div>
    <?php echo $content ; ?>
</main>
<footer class="container">
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
</body>
</html>

 
    
