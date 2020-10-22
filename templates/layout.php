<!DOCTYPE html>
<html>
<head>
<title><?=$title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php">Главная</a></li>
          <li><a href="support.php">Поддержка</a></li>
          <li><a href="about.php">О нас</a></li>
          <li><a href="contact.php">Контакты</a></li>
        </ul>
      </div>
      <div class="logo">
        <h1><a href="index.php">Green<span>Line</span></a> <small>put your slogan here</small></h1>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">

        <?=$content;?>
        
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" placeholder="Поиск по сайту:" type="text" />
            </span>
            <input name="button_search" src="images/search_btn.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Категории</span></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <? foreach ($arrCategory as $category): ?>
            <li><a href="?<?=setPageParam('category', $category['id']);?>"><?=$category['title'];?></a></li>
            <? endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Фото</span></h2>
        <a href="#"><img src="images/pix1.jpg" width="58" height="58" alt="" /></a>
        <a href="#"><img src="images/pix2.jpg" width="58" height="58" alt="" /></a>
        <a href="#"><img src="images/pix3.jpg" width="58" height="58" alt="" /></a>
        <a href="#"><img src="images/pix4.jpg" width="58" height="58" alt="" /></a>
        <a href="#"><img src="images/pix5.jpg" width="58" height="58" alt="" /></a>
        <a href="#"><img src="images/pix6.jpg" width="58" height="58" alt="" /></a>
      </div>
      <div class="col c2">
        <h2><span>Подписка на новости</span></h2>
        <p>Будь в курсе!<br />
          На сайте представлена подборка самых свежих новостей науки, медицины, современных технологий и многого другого. Вы можете подписаться на нашу рассылку, чтобы всегда быть в курсе.</p>
        <div>
          <form class="subscribe">
            <input type="email" name="email" placeholder="Ваш email" />
            <input type="submit" class="button" value="Подписаться" />
          </form>
        </div>
      </div>
      <div class="col c3">
        <h2><span>Контакты</span></h2>
        <p>Мы будем рады ответить на любые вопросы.</p>
        <p><a href="#">support@yoursite.com</a></p>
        <p>+1 (123) 444-5677<br />
          +1 (123) 444-5678</p>
        <p>Адрес: 123 TemplateAccess Rd1</p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
      <p class="rf"><a href="">Free CSS Templates</a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
<!-- END PAGE SOURCE -->
</body>
</html>