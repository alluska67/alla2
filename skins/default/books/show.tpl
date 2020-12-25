<div class="all_news_inside">
  <h3><?=$info ?? ''; ?></h3>
    <?php foreach ($books as $k => $book ){ ?>
      <div class="card">
        <div class="card-body">
          <h2 class="card-title title_news p-3 mb-2 bg-info text-white"><?=htmlspecialchars($book['title']); ?></h2>
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
                  <p class="card-text p-1 mb-1 text-dark"><?=htmlspecialchars($book['description']) ;?> </p>
                  <p class="card-text"><?=(int)($book['pages']); ?> страниц</p>
                  <p class="card-text text-danger">Цена: <?=(int)($book['price']); ?> грн</p>
              </div>
            </div>
          </div>
          <h2 class="card-title title_news p-2 mb-2 text-center text-info">Автор: </h2>
            <div class="text-center card-group"">
              <?php foreach ($book['author'] as $author ){ ?>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-info"><?=htmlspecialchars($author['name']); ?></h5>
                    <a href="/authors/show?action=show&author=<?=$author['id'];?>" class="btn btn-info" >Перейти к автору</a>
                    <?php if(empty($author['image'])) { ?>
                      <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
                    <?php } else { ?>
                      <img src="<?='/uploaded/authors/'.htmlspecialchars($author['image']); ?>" class="rounded mx-auto d-block m-3" style="width: 100px">
                    <?php } ?>
                  </div>
                </div>
              <?php }?>
            </div>
            <p  style="margin-top: 14px;"><a href="/books" class="p-2 mb-2 bg-secondary text-white">Вернуться ко всем книгам</a></p>
          </div>
        </div>
    <?php } ?>
</div>
