<div class="all_news_inside">
  <?=$info ?? '' ;?>
  <h2 class="text-info border  h2_right_news" >Всего книг: <?=count($books);?> :</h2>
  <form action="" method="post">
    <?php foreach ($books as $k=> $book) { ?>
      <div class="card mb-12 border border-secondary news_content">
        <div class="row no-gutters">
          <div class="col-md-2 img_news ">
            <?php if(empty($book['img'])) { ?>
              <img src="/uploaded/no_image.png" class="card-img " alt="...">
            <?php } else { ?>
              <span class="border border-secondary rounded"><img src="<?='/uploaded/books/'.htmlspecialchars($book['img']); ?>" class="card-img rounded-lg" alt="..."></span>
            <?php } ?>
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <p class="card-text"><small class="p-1 mb-2 bg-info text-white"><?=htmlspecialchars($book['date_edited'] ?? '') ;?></small></p><br>
              <?php if(isset($book['authors'])) {?>
                <?php foreach ($book['authors'] as $author) { ;?>
                  <h5 class="card-title"><?=htmlspecialchars($author['name']) ?? '';?></h5>
                <?php }?>
              <?php }?>
              <h5 class="card-title"><a href="/books/show?action=show&book=<?=htmlspecialchars($book['books_id']); ?>"><?=htmlspecialchars(mb_strimwidth($book['title'], 0, 100,'...')); ?></a><br></h5>
              <p class="card-text"><?=htmlspecialchars(mb_strimwidth($book['description'], 0, 200,'...')); ?></p>
              <p class="card-text"><small class="p-1 mb-2 bg-info text-white"><?=htmlspecialchars($book['price']) ;?> грн</small></p><br>
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




