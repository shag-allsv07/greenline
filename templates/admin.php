<?php if($_SESSION['is_admin'] == '1') : ?>
<div class="form-add__news">

        <?php if ($_SESSION['error'] == 'error'): ?>
            <span class="error" style="font-size: 18px;">Заполните все поля</span>
        <?php endif; ?>
        <?php if ($_SESSION['add_news'] == '1'): ?>
            <span class="succes">Запись добавлена успешно</span>
            <?php unset($_SESSION['add_news']); ?>
        <?php endif; ?>
        <?php if ($_SESSION['add_news'] == '0'): ?>
            <span class="error">Произошла ошибка при добавлении записи.</span>
            <?php unset($_SESSION['add_news']); ?>
        <?php endif; ?>
        
    <form action="/ajax/add_news.php" method="post" enctype="multipart/form-data" id="form-add-news">
        <div class="block_title">
            <label for="title">Название статьи</label><br>
        <input type="text" name="title" class="title-add_news <?if ($_SESSION['error'] == 'error'):?>input_error<?endif;?>" id="title-add_news">
        </div>
        <div class="block_prewiew-text">
            <label for="prewiew-text">Краткое описание статьи</label><br>
            <textarea name="prewiew-text" id="prewiew-text" class="prewiew-text-add_news <?if ($_SESSION['error'] == 'error'):?>input_error<?endif;?>"></textarea>
        </div>
        <div class="block_detail-text">
            <label for="detail-text">Описание статьи</label><br>
            <textarea name="detail-text" id="detail-text" class="detail-text-add_news <?if ($_SESSION['error'] == 'error'):?>input_error<?endif;?>"></textarea>
        </div>
        <div class="block_image">
            <label for="upload_image">Выберите изображение</label><br>
            <input type="file" name="upload_image" class="upload_image-add_news" id="upload_image-add_news">
        </div>
        <div class="block_category">
            <label for="category">Выберите категорию</label><br>
            <select name="category" id="category-add_news" class="category-add_news">
                <?php $count = 0; ?>
                <?php foreach ($arrCategory as $category) : ?>
                <option value="<?=$category['id'];?>"><?=$category['title'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="block_tags">
            <label for="add_tags">Введите тэг новости</label><br>
            <input type="text" name="add_tags" id="add_tags" class="add_tags <?if ($_SESSION['error'] == 'error'):?>input_error<?endif;?>"><br>
        </div>
        <?php unset($_SESSION['error']); ?>
        <input type="submit" name="btn-add_news" id="btn-add_news" class="btn-add_news" value="Сохранить">
    </form>
</div>
<?php else: ?>
<div class="form_auth">
    <form method="post">
        <input type="text" name="login" class="login" id="" placeholder="Логин"><br><br>
        <input type="password" name="password" class="password" id="" placeholder="Пароль"><br><br>
        <input type="submit" value="Войти">
    </form>
</div>
<?php endif; ?>