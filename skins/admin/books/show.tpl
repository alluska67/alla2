<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
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
                <p class="card-text"><small class="p-1 mb-1 bg-secondary text-dark"><?=htmlspecialchars($book['description']) ;?> </small></p>
                <p class="card-text"><?=(int)($book['pages']); ?></p>
                <p class="card-text"><?=(int)($book['price']); ?></p>
              </div>
            </div>
          </div>
          <h2 class="card-title title_news p-2 mb-2 text-center text-info">Автор: </h2>
            <div class="card-group"">
              <?php foreach ($book['author'] as $author ){ ?>
                <div class="card">
                  <?php if(empty($author['image'])) { ?>
                    <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
                  <?php } else { ?>
                    <img src="<?='/uploaded/authors/'.htmlspecialchars($author['image']); ?>" class="card-img-top rounded " style="width: 100px">
                  <?php } ?>
                  <div class="card-body">
                    <h5 class="card-title text-info"><?=htmlspecialchars($author['name']); ?></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="/admin/authors/show?action=show&author=<?=$author['id'];?>" class="btn btn-info" >Перейти к автору</a>
                  </div>
                </div>
              <?php }?>

            </div>
          <p  style="margin-top: 14px;"><a href="/admin/books" class="p-2 mb-2 bg-secondary text-white">Вернуться ко всем книгам</a></p>
          </div>
        </div>
      </div>

    <?php } ?>
  </div>
<?php } else { ?>
  Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>