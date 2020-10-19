<?php if (!empty($arrPage)): ?>

    <p class="pages">
        <small>Страница <?=$curPage;?> из <?=$totalPage;?></small>

        <?php foreach ($arrPage as $nPage):?>

            <?php if ($curPage == $nPage): // Если текущая страница?>

            <span><?=$nPage;?></span>
            <?php else: ?>
            <a href="?page=<?=$nPage;?>"><?=$nPage;?></a>

            <?php endif; ?>

        <?php endforeach; ?>

        <a href="#">&raquo;</a>
    </p>

<?php endif; ?>