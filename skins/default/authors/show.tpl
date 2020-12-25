<div class="all_news_inside">
  <h3><?=$info ?? ''; ?></h3>
    <?php foreach ($authors as $k => $author ){ ?>
      <div class="card">
        <div class="card-body">
          <h2 class="card-title title_news p-3 mb-2 bg-info text-white"><?=htmlspecialchars($author['name']); ?></h2>
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
                  <p class="card-text"><small class="p-1 mb-1 bg-secondary text-dark">Год рождения:<?=(int)$author['years'] ?> </small></p>
                  <p class="card-text"><?=htmlspecialchars($author['biography']); ?></p>
                </div>
              </div>
            </div>
            <h2 class="card-title title_news p-2 mb-2 text-center text-info">Все книги автора: </h2>
            <div class="text-center card-group"">
              <?php foreach ($author['book'] as $book ){ ?>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-info"><?=htmlspecialchars($book['title']); ?></h5>
                    <a href="/books/show?action=show&book=<?=$book['id'];?>" class="btn btn-info" >Перейти к книге</a>
                      <?php if(empty($book['image'])) { ?>
                        <span><img src="/uploaded/no_image.png" alt="" class="no_image card text-center"></span>
                      <?php } else { ?>
                        <img src="<?='/uploaded/books/'.htmlspecialchars($book['image']); ?>" class="rounded mx-auto d-block m-3" style="width: 150px">
                      <?php } ?>
                  </div>
                </div>
              <?php }?>
            </div>
        </div>
        <p  style="margin-top: 14px;"><a href="/authors" class="p-2 mb-2 bg-secondary text-white">Вернуться к авторам</a></p>
      </div>
    <?php } ?>
</div>
