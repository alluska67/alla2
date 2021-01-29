$( document ).ready(function() {

    $( "#comment_submit" ).on('click',function( event ) {
        console.log('123');

        event.preventDefault();
        var data_form = $(this).serialize();



        $.ajax ({


            url: '/modules/comments/main.php',//происходит на этой странице, что заявлена в форме
            type: "POST",
            cache: false,
            timeout: 15000,
            data: data_form,//данные именно из этой формы
            dataType: "JSON",
            success: function (data) {
                if (data.errors != '') {
                    $('#comment_form')[0].reset();
                    $('#comment_text').html(data.errors);

                }


            },
            error: function (x, t, m) {
                if (t==="timeout") {
                    alert('timeout');
                } else {
                    alert('Что-то пошло не так =(');
                }
            }

        });
    });
});