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
                    console.log(data);
                }
            });
        }
    });

});