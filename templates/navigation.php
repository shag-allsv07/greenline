<?php if ($show): ?>

    <p class="pages">
        <small>Страница <?=$curPage;?> из <?=$totalPage;?></small>

        <?php if ($curPage > 2): // выводим ссылку на первцю страницу, если нужна?>
            <a href="?<?=setPageParam('page', 1)?>">«</a>
        <?php endif;?>

        <?php if ($prevPage != ''): // выводим ссылку на предыдущую страницу?>

            <a href="?<?=setPageParam('page', $prevPage);?>"><?=$prevPage;?></a>
        <?php endif;?>

        <span><?=$curPage;?></span> <?// текущая страница?>

        <?php if ($nextPage != ''): // выводим ссылку на следующую страницу?>
            <a href="?<?=setPageParam('page', $nextPage);?>"><?=$nextPage;?></a>
        <?php endif;?>

        <?php if ($curPage < $totalPage-1):  // выводим ссылку на последнюю страницу, если нужна?>
            <a href="?<?=setPageParam('page', $totalPage);?>">»</a>
        <?php endif; ?>
    </p>

<?php endif; ?>


<?php /*foreach ($arrPage as $nPage):?>

            <?php if ($curPage == $nPage): // Если текущая страница?>

            <span><?=$nPage;?></span>
            <?php else: ?>
            <a href="?page=<?=$nPage;?>"><?=$nPage;?></a>

            <?php endif; ?>

        <?php endforeach;*/ ?>
