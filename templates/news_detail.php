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
        <p><a href="#"><strong>Comments (<?=$arrNewsDetail['comments_cnt'];?>)</strong></a> <span>&nbsp;&bull;&nbsp;</span> <?=new_time($arrNewsDetail['date']);?> <span>&nbsp;&bull;&nbsp;</span> <a href="#"><strong>Edit</strong></a></p>
    </div>
    <div class="article">
        <h2><span>3</span> Responses</h2>
        <div class="clr"></div>
        <div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">admin</a> Says:<br />
                April 20th, 2009 at 2:17 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.</p>
        </div>
        <div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">Owner</a> Says:<br />
                April 20th, 2009 at 3:21 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</p>
        </div>
        <div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">admin</a> Says:<br />
                April 20th, 2009 at 2:17 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.</p>
        </div>
    </div>
    <div class="article">
        <h2><span>Leave a</span> Reply</h2>
        <div class="clr"></div>
        <form action="#" method="post" id="leavereply">
            <ol>
                <li>
                    <label for="name">Name (required)</label>
                    <input id="name" name="name" class="text" />
                </li>
                <li>
                    <label for="email">Email Address (required)</label>
                    <input id="email" name="email" class="text" />
                </li>
                <li>
                    <label for="website">Website</label>
                    <input id="website" name="website" class="text" />
                </li>
                <li>
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="8" cols="50"></textarea>
                </li>
                <li>
                    <input type="image" name="imageField" id="imageField" src="images/submit.gif" class="send" />
                    <div class="clr"></div>
                </li>
            </ol>
        </form>
    </div>

