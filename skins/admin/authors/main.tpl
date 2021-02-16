<div class="all_news_inside">
  <p style="margin-left: 157px;margin-top: 20px;color: #c608c3;"><?=$info ?? '' ;?></p>
  <a class="btn btn-success" href="/admin/authors/add">Добавить автора</a>
  <h2 class="text-info border  h2_right_news" >Всего авторов <?=count($authors);?>:</h2>
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
              <h5 class="card-title"><a href="/admin/authors/show?action=show&author=<?=htmlspecialchars($author['authors_id']);?>"><?=htmlspecialchars($author['name']); ?></a><br></h5>
              <p class="card-text"><small class="p-1 mb-2 bg-light ">Год рождения:<?=(int)$author['years'] ?> </small></p><br>
              <p class="card-text"><?=htmlspecialchars(mb_strimwidth($author['biography'], 0, 200,'...')); ?></p>
              <p>Произведения автора:</p>
              <?php foreach ($author['book'] as $book) { ;?>
                <p class="card-text"><small class="p-1 mb-2 bg-info text-white"><?=htmlspecialchars($book) ;?></small></p>
              <?php }?>
            </div>
          </div>
          <div class="delete_edit col-md-0.7">
            <a href="/admin/authors/main?action=delete&id=<?=(int)($author['authors_id']); ?>">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
            </a>
            <a href="/admin/authors/edit?id=<?=(int)($author['authors_id']); ?>">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
              </svg>
            </a>
            <input class="checkbox_news" type="checkbox" name="ids[]" value="<?=(int)($author['authors_id']); ?>">
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="delete_all">
      <input class="btn btn-outline-danger delete_bottom_news" type="submit" name="delete" value="delete">
    </div>
  </form>
  <nav aria-label="Page navigation example">
    <?=Paginator::nav($uri);?>
  </nav>
</div>




