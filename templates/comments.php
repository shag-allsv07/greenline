<?php if (!empty($arrComments)): ?>

<h2>Комментарии к новости<span>: <?=count($arrComments);?></span></h2>
<div class="clr"></div>

<?php foreach ($arrComments as $comment): ?>
<div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
    <p><a href="#"><?=$comment['author'];?></a> Says:<br />
        <?=new_time($comment['date']);?></p>
    <p><?=$comment['text'];?></p>
</div>
<?php endforeach; ?>

<?php else: ?>
<h2><span></span> Комментарии к новости</h2>
<p>Комментариев пока нет</p>
<?php endif; ?>