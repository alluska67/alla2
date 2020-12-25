<div class="all_news_inside">
  <?=$info ?? '' ;?>
  <h2 class="text-info border h2_right_news" >Всего авторов <?=count($authors);?>:</h2>
  <form action="" method="post">
    <?php foreach ($authors as $k => $author) { ;?>
      <div class="card mb-12 border border-secondary news_content">
        <div class="row no-gutters">
          <div class="col-md-2 img_news ">
            <?php if(empty($author['img'])) { ?>
              <img src="/uploaded/no_image.png" class="card-img " alt="...">
            <?php } else { ?>
              <span class="border border-secondary rounded"><img src="<?='/uploaded/authors/'.htmlspecialchars($author['img']); ?>" class="card-img rounded-lg" alt="..."></span>
            <?php } ?>
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title"><a href="/authors/show?action=show&author=<?=htmlspecialchars($author['authors_id']); ?>"><?=htmlspecialchars($author['name']); ?></a><br></h5>
              <p class="card-text"><small class="p-1 mb-2 bg-light ">Год рождения:<?=(int)$author['years'] ?> </small></p><br>
              <p class="card-text"><?=htmlspecialchars(mb_strimwidth($author['biography'], 0, 200,'...')); ?></p>
              <p>Произведения автора:</p>
              <?php foreach ($author['book'] as $book) { ;?>
                <p class="card-text"><small class="p-1 mb-2 bg-info text-white"><?=htmlspecialchars($book) ;?></small></p>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </form>
  <nav aria-label="Page navigation example">
    <?=Paginator::nav($uri);?>
  </nav>
</div>




