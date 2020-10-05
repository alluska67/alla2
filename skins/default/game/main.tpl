<div class="all_game">
  <div class="game_head">
    <div class="game_header_image">
      <img src="/skins/<?php echo Core::$SKIN; ?>/img/head2.jpg" alt="RANDOM_GAME" class="game_head2">
    </div>
  </div>
  <div class="game_central">
    <div class="game_central_inside">
      <div class="game_left">
        <div class="game_left_image">
          <p class="game_left_text">
            <?php echo 'У СЕРВЕРА осталось '.$_SESSION['captain'].' очков'; ?>
          </p>
          <img src="/skins/<?php echo Core::$SKIN; ?>/img/Captain_America1.png" alt="Captain_America" class="captain">
        </div>
      </div>
      <div class="game_middle">
        <div class="game_middle_incide">
          <p class="">Введите цифру от 1 до 3</p>
            <?=$error;?>
          <form action="" method="post" name="game">
            <input type="number" name="ironman_num" min="1" max="3">
            <input type="submit" name="submit" value="В бой!">
          </form>
          <a href="?refresh=1">Начать заново</a>
        </div>
      </div>
      <div class="game_right">
        <div class="game_right_image">
          <p class="game_right_text">
            <?php echo 'У Вас осталось '.$_SESSION['ironman'].' очков'; ?>
          </p>
          <img src="/skins/<?php echo Core::$SKIN; ?>/img/Iron_Man1.png" alt="Iron_Man" class="iron">
        </div>
      </div>
    </div>
  </div>
</div>
