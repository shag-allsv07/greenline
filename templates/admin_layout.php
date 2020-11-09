<!DOCTYPE html>
<html>
<head>
    <title><?=$title;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/radius.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="overlay" class="overlay"></div>
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="menu_nav">
                <ul>
                    <li <?php if ($menuActive == 'index'):?> class="active" <?endif;?>><a href="index.php">Главная</a></li>
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

            <div class="clr"></div>
        </div>
    </div>

    <div class="footer">
        <div class="footer_resize">
            <p class="lf">Copyright &copy; <?=date("Y");?> <a href="#">SiteName</a> - All Rights Reserved</p>
            <p class="rf"><a href="">Free CSS Templates</a></p>
            <div class="clr"></div>
        </div>
    </div>
</div>

<div id="ok_subscribe" class="ok_subscribe">
    <div class="msg_subscribe">
        <span>Вы подписались на рассылку новостей</span>
    </div>
</div>
<!-- END PAGE SOURCE -->
</body>
</html>