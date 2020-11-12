<?php
/**
 * $arrNews - список новостей
 */
?>
<? if (!empty($arResultSearch)): ?>
    <? foreach($arResultSearch as $news): ?>
        <div class="article">
            <h2><?=$news['title'];?></h2>
            <div class="clr"></div>
            <p><span class="date"><?=new_time($news['date']);?></span> | Автор <a href="#">Admin</a> &nbsp;|&nbsp; Категория <a href="#"><?=$news['news_cat'];?></a></p>
            <img src="<?=IMG_PATH;?>/<?=$news['image'];?>" width="625" height="205" alt="" />
            <p><?=$news['detail_text'];?></p>
            <p class="spec"><a href="/news_detail.php?id=<?=$news['id'];?>" class="rm">Читать далее &raquo;</a> <a href="#" class="com"><span><?=$news['comments_cnt'];?></span> Комментариев</a></p>
        </div>
    <? endforeach; ?>

    <?=$navigation;?>

<? else: ?>
    <p>По вашему запросу ничег оне найдено</p>
<? endif; ?>
