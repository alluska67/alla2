<div class="goods">
  <div class="goods_incide">
    <?php
    if(!isset($_SESSION['user']) || $_SESSION['user']['access'] !=7 ) {
        include './skins/default/cab/authorization.tpl';
    }?>
  </div>
</div>

