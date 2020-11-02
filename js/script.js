$(document).ready(function () {
    $("#send_comment").click(function () {
        let name = $("#name");
        let email = $("#email");
        let message = $("#message");

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
        else {
            $("#form_error").html("Заполните все поля");
        }
    });
    $("input, textarea").focus(function () { // очищаем ошибки
        $("#form_error").html('');
    });
});