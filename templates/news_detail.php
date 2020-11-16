<?php

?>

    <div class="article">
        <h2><?=$arrNewsDetail['title'];?></h2>
        <div class="clr"></div>
        <p>Автор <a href="#">Admin</a> <span>&nbsp;&bull;&nbsp;</span> Категории <a href="#"><?=$arrNewsDetail['news_cat']?></a></p>
        <img src="<?=IMG_PATH;?>/<?=$arrNewsDetail['image'];?>" width="625" height="205" alt="" />
        <p>
            <?=$arrNewsDetail['detail_text'];?>
        </p>
        <? if (!empty($arrTags)): ?>
        <p>Тэги:
        <? foreach ($arrTags as $tag): ?>
            <a href="/?tag=<?=$tag['tag'];?>">#<?=$tag['tag'];?></a>&nbsp;
        <? endforeach; ?>
        </p>
        <? endif; ?>
        <p><a href="#"><strong>Комментарии (<span id="comments_count"><?=$arrNewsDetail['comments_cnt'];?></span>)</strong></a> <span>&nbsp;&bull;&nbsp;</span> <?=new_time($arrNewsDetail['date']);?> <span>&nbsp;&bull;&nbsp;</span> <a href="#"><strong>Edit</strong></a></p>
    </div>
    <div class="article">

    <div id="comments"><?=$comments;?></div>
    </div>
    <div class="article">
        <h2><span>Оставьте</span> комментарий</h2>
        <div class="clr"></div>
        <form action="#" method="post" id="form">
            <input type="hidden" name="news_id" value="<?=$arrNewsDetail['id'];?>">
            <ol>
                <li>
                    <label for="name">Ваше имя</label>
                    <input id="name" name="name" class="text" />
                    <div class="error" id="form_error_name"></div>
                </li>
                <li>
                    <label for="email">Ваш Email</label>
                    <input id="email" name="email" class="text" />
                    <div class="error" id="form_error_email"></div>
                </li>
                <li>
                    <label for="message">Ваш комментарий</label>
                    <textarea id="message" name="message" rows="8" cols="50"></textarea>
                    <div class="error" id="form_error_message"></div>
                </li>
                <li>
                    <input type="button" class="button" value="Отправить" name="send_comment" id="send_comment" />
                    <div class="clr"></div>
                </li>
            </ol>
        </form>
    </div>

