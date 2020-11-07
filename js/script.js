$(document).ready(function () {
    $("#send_comment").click(function () {
        let name = $("#name");
        let email = $("#email");
        let message = $("#message");

        //

        if (name.val() == '') {
            $("#form_error_name").html("Заполните поле");
            name.css("border", "1px solid red");
        }
        if (email.val() == '') {
            $("#form_error_email").html("Заполните поле");
            email.css("border", "1px solid red");
        }
        if (message.val() == '') {
            $("#form_error_message").html("Заполните поле");
            message.css("border", "1px solid red");
        }

        name.focus(function () { // очищаем ошибки
            $("#form_error_name").html('');
            name.css("border", "1px solid #c0c0c0");
        });
        email.focus(function () { // очищаем ошибки
            $("#form_error_email").html('');
            email.css("border", "1px solid #c0c0c0");
        });
        message.focus(function () { // очищаем ошибки
            $("#form_error_message").html('');
            message.css("border", "1px solid #c0c0c0");
        });


        if (name.val() != '' && email.val() != '' && message.val() != '') {
            $.ajax({
               type: 'post',
                url: '/ajax/add_comment.php',
                data: $("#form").serialize(),
                success: function (data) {
                    let dat = JSON.parse(data);

                    $("#comments").html(dat.comments);
                    $("#comments_count").html(dat.comments_count);

                    name.val('');
                    email.val('');
                    message.val('');
                }
            });
        }
    });

    $("#subscribe_btn").click(function () {
        let email = $("#subscribe_email");

        if (email.val() == '') {
            $("#form_error_subscribe").html('Заполните поле');
            email.css("border", "1px solid red");
        }
        $("#form_error_subscribe").html('');
        email.css("border", "1px solid #c0c0c0");

        if (email.val() != '') {
            $.ajax({
               type: 'post',
                url: '/ajax/subscribe.php',
                data: $('#subscribe_email'),
                success: function (data) {
                    if (data == 'ok_subscribe') {
                        let overlay = $("#overlay");
                        let msg = $("#ok_subscribe");
                        overlay.addClass('active');
                        msg.addClass('active');
                    }
                    if (data == 'error_subscribe') {
                        $("#form_error_subscribe").html('Такой email уже подписан');
                    }
                    $("#form_error_subscribe").html('');

                    $(document).click(function () {
                        $(".overlay").removeClass('active');
                        $(".ok_subscribe").removeClass('active');
                    });
                }
            });
        }
    });
});