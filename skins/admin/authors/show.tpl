<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) { ?>
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
                  <p class="card-text"><small class="p-1 mb-1 bg-secondary text-dark"><?=htmlspecialchars($author['years_of_life']) ;?> </small></p>
                  <p class="card-text"><?=htmlspecialchars($author['biography']); ?></p>
                </div>
              </div>
            </div>
            <h2 class="card-title title_news p-2 mb-2 text-center text-info">Все книги автора: </h2>
            <div class="card-group"">
              <?php foreach ($author['book'] as $book ){ //wtf($book);?>
                <div class="card">
                  <?php if(empty($book['image'])) { ?>
                    <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
                  <?php } else { ?>
                    <img src="<?='/uploaded/books/'.htmlspecialchars($book['image']); ?>" class="card-img-top rounded " style="width: 150px">
                  <?php } ?>
                  <div class="card-body">
                    <h5 class="card-title text-info"><?=htmlspecialchars($book['title']); ?></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="/admin/books/show?action=show&book=<?=$book['id'];?>" class="btn btn-info" >Перейти к книге</a>
                  </div>
                </div>
              <?php }?>
            </div>
        </div>
        <p  style="margin-top: 14px;"><a href="/admin/authors" class="p-2 mb-2 bg-secondary text-white">Вернуться к авторам</a></p>
      </div>
    <?php } ?>
  </div>
<?php } else { ?>
  Доступ запрещен! Обратитесь в техподдержку для уточнения деталей блокировки вашего аккаунта
<?php }?>