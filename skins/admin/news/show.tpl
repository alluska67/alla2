<?php if(isset($_GET['action'],$_GET['id']) && $_GET['action'] == 'show') { ?>
    <h2 class="total">Всего новостей : <?=$display_category->num_rows;?></h2>
    <?php while ($row = $show_news->fetch_assoc()){ ?>
        <div class="media">
            <div class="media_inside">
                <div class="media_date"><?=htmlspecialchars($row['date']) ;?></div>
                <div class="media_title"><?=htmlspecialchars($row['title']); ?></div>
                <div class="media_description"><?=htmlspecialchars($row['description']); ?></div>
                <div class="media_description"><?=htmlspecialchars($row['text']); ?></div>
                <div class="media_description"><?=htmlspecialchars($row['author']); ?></div>

                <div class="media_img">
                    <?php if(empty($row['img'])) { ?>
                        <span><img src="/uploaded/no_image.png" alt="" class="no_image"></span>
                    <?php } else { ?>
                        <span><a href="/admin/news/main?action=show&id=<?=(int)($row['id']); ?>"><img src="<?='/uploaded/news/'.htmlspecialchars($row['img']); ?>" alt=""></a></span>
                        <span><a href="/admin/news/main?action=delete&id=<?=(int)($row['id']); ?>"><img src="/skins/admin/img/delete.png" alt="delete" class="delete"></a></span>
                    <?php } ?>
                </div>
                <a href="/admin/news/main?action=show&id=<?=(int)($row['id']); ?>">Читать дальше</a>
                <a href="<?=(int)($row['id']); ?>">Удалить</a>
                <a href="/admin/news/edit?id=<?=(int)($row['id']); ?>">Редактировать</a>
            </div>
        </div>
    <?php } ?>
<?php } ?>

