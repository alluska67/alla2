
var last_id = 0 //последний добавленный id, по умолчанию 0

$(function () {
    ajax();
    setTimeout(function run() {
        ajax();
        setTimeout(run, 5000);
    }, 5000);
});


function ajax() {
    $.ajax({

        url: '/comments/ajax',
        type: 'POST',
        timeout: 15000,
        data: {'last_id': last_id},
        cache: false,
        dataType: 'JSON',


        success: function (response) {
            console.log(response)
            if (response['status'] === 'success') {
                //    выводим комментарий
                response.data.forEach(function (value) {

                    printComment(value);
                    last_id = value.id;

                });
            }
        },
        error: function (xhr, textStatus, error) {
            console.log(textStatus);
        }

    });
}


function printComment(data) {
    $('.comments_top').prepend(
        '<div class="comments_top_incide">\n' +
        '  <div class="top_name_date">' +
        '    <div class="comment_name">' + data.name + '</div>' +
        '    <div class="comment_date">' + data.date + '</div>' +
        '    <div class="comments_text">' +
        '      <p class="comments_text_incide">' + data.text + '</p>' +
        '    </div>' +
        '  </div>' +
        '</div>'
    );
}


$(function () {

    $('#comment_submit').click(function (e) {
        e.preventDefault();

        $('#ajax').html('<span>Sending</span>').fadeIn(1000, function () {

            var result = $('#comment_form').serializeArray();
            var self = $(this);

            $.ajax({

                url: '/comments/ajax',
                type: 'POST',
                timeout: 15000,
                data: result,
                cache: false,
                dataType: 'JSON',

                success: function (response) {

                    if (response['status'] === 'success') {

                        self.find('span').fadeOut(300, function () {
                            $(this).text('Comment added').fadeIn(300);

                        });

                        self.delay(700).fadeOut(1000, function () {
                            $('form').trigger("reset");
                        });
                    } else if (response['status'] === 'error') {
                        self.delay(1000).fadeOut(100, function () {
                            response.data.name ? alert(response.data.name) : '';
                            response.data.email ? alert(response.data.email) : '';
                            response.data.text ? alert(response.data.text) : '';
                        });
                    }

                },
                error: function (xhr, textStatus, error) {
                    console.log(textStatus)
                }

            });

        });
    });
});

function hideShow(id)  {
    var on_click = document.getElementById(id);

    if (on_click.style.display === 'block') {
        on_click.style.display = 'none';
    } else {
        on_click.style.display = 'block';
    }
}


function authorizationCheck () {
    var login = document.getElementById('login').value;
    var pass = document.getElementById('password').value;

    if (login.length < 2 || login.length > 16) {
        alert('Длинна логина должна быть не менее 2 символов и не больше 16. Вы ввели ' + login.length + ' символ(ов)');
        return false;
    }

    if (pass.length < 4) {
        alert('Пароль должен быть не менее 4-х символов. Вы ввели ' + pass.length + ' символ(ов)');
        return false;
    }
    document.getElementById('auth_form').submit();
}

