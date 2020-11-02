<?php

?>

    <div class="article">
        <h2><?=$arrNewsDetail['title'];?></h2>
        <div class="clr"></div>
        <p>Автор <a href="#">Admin</a> <span>&nbsp;&bull;&nbsp;</span> Категории <a href="#"><?=$arrNewsDetail['news_cat']?></a></p>
        <img src="images/<?=$arrNewsDetail['image'];?>" width="625" height="205" alt="" />
        <p>
            <?=$arrNewsDetail['detail_text'];?>
        </p>
        <p>Tagged: <a href="#">orci</a>, <a href="#">lectus</a>, <a href="#">varius</a>, <a href="#">turpis</a></p>
        <p><a href="#"><strong>Комментарии (<?=$arrNewsDetail['comments_cnt'];?>)</strong></a> <span>&nbsp;&bull;&nbsp;</span> <?=new_time($arrNewsDetail['date']);?> <span>&nbsp;&bull;&nbsp;</span> <a href="#"><strong>Edit</strong></a></p>
    </div>
    <div class="article">

    <?=$comments;?>
    </div>
    <div class="article">
        <h2><span>Оставьте</span> комментарий</h2>
        <div class="clr"></div>
        <div class="error" id="form_error"></div>
        <form action="#" method="post" id="form">
            <input type="hidden" name="news_id" value="<?=$arrNewsDetail['id'];?>">
            <ol>
                <li>
                    <label for="name">Ваше имя</label>
                    <input id="name" name="name" class="text" />
                </li>
                <li>
                    <label for="email">Ваш Email</label>
                    <input id="email" name="email" class="text" />
                </li>
                <li>
                    <label for="message">Ваш комментарий</label>
                    <textarea id="message" name="message" rows="8" cols="50"></textarea>
                </li>
                <li>
                    <input type="button" class="button" value="Отправить" name="send_comment" id="send_comment" />
                    <div class="clr"></div>
                </li>
            </ol>
        </form>
    </div>

