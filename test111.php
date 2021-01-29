<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<!--<script>-->
<!--    function myAjax() {-->
<!---->
<!---->
<!--        $.ajax ({-->
<!--            url: '/comments/main.php',-->
<!--            type: "POST",-->
<!--            cache: false,-->
<!--            timeout: 15000,-->
<!--            data: {},-->
<!--            success: function (msg) {-->
<!--                var response = JSON.parse(msg);-->
<!--                alert(response.name);-->
<!--            },-->
<!--            error: function (x, t, m) {-->
<!--                if (t==="timeout") {-->
<!--                    alert('timeout');-->
<!--                } else {-->
<!--                    alert('Message hasn\'t been sent. Error: server doesn\'t answer</span></div>');-->
<!--                }-->
<!--            }-->
<!---->
<!--        });-->
<!--    }-->
<!--    window.onload = function () {-->
<!--        document.getElementById('add_comment').onclick = myAjax;-->
<!--    }-->
<!---->
<!--</script>-->
<input id="add_comment" class="add_comment" type="submit" name="send"  value="Добавить комментарий">
<!---->
<!--<script>-->
<!--    //debugger;-->
<!--function myAjax() {-->
<!--    document.getElementById('yyy').innerHTML += '<br>Login = Alluska67';-->
<!---->
<!--    $.ajax ({-->
<!--        url: '/test_ajax.php',-->
<!--        type: "POST",-->
<!--        cache: false,-->
<!--        timeout: 5000,-->
<!--        data: { key1 : 'value', key2 : 'value2' },-->
<!--        //timeout: 15000,-->
<!--        success: function (msg) {-->
<!--            if(msg == 'Ok') {-->
<!--                document.getElementById('empty').innerHTML = 'Коммент добавлен';-->
<!--            } else {-->
<!--                document.getElementById('empty').innerHTML = msg;-->
<!--            }-->
<!---->
<!--        },-->
<!--        error: function (x, t, m) {-->
<!--            if (t==="timeout") {-->
<!--                alert('timeout');-->
<!--            } else {-->
<!--                alert('Message hasn\'t been sent. Error: server doesn\'t answer</span></div>');-->
<!--            }-->
<!--        }-->
<!---->
<!--    });-->
<!--}-->
<!--window.onload = function () {-->
<!--  document.getElementById('xxx').onclick = myAjax;-->
<!--}-->
<!---->
<!---->
<!--</script>-->

<!---->
<!--<head>-->
<!--    <body>-->
<!--        <div id="empty"></div>-->
<!--        <div id="xxx" >Тестируем Ajax</div>-->
<!--        <div id="yyy">Тестируем jQuery</div>-->
<!--    </body>-->
<!--</head>-->
<!---->
<!---->
<!--<script>-->
<!--    function myAjax() {-->
<!---->
<!--        $.ajax ({-->
<!--            url: '/test_ajax.php',-->
<!--            type: "POST",-->
<!--            cache: false,-->
<!--            timeout: 15000,-->
<!--            data: { key1 : 'value', key2 : 'value2' },-->
<!--            success: function (msg) {-->
<!--                var response = JSON.parse(msg);-->
<!--                alert(response.name);-->
<!---->
<!--            },-->
<!--            error: function (x, t, m) {-->
<!--                if (t==="timeout") {-->
<!--                    alert('timeout');-->
<!--                } else {-->
<!--                    alert('Message hasn\'t been sent. Error: server doesn\'t answer</span></div>');-->
<!--                }-->
<!--            }-->
<!---->
<!--        });-->
<!--    }-->
<!---->
<!--window.onload = function () {-->
<!--    document.getElementById('xxx').onclick = myAjax;-->
<!--}-->
<!--</script>-->
<!---->
<!---->
<!--<head>-->
<!--    <body>-->
<!--        <div id="empty"></div>-->
<!--        <div id="xxx" >Тестируем Ajax</div>-->
<!--        <div id="yyy">Тестируем jQuery</div>-->
<!--    </body>-->
<!--</head>-->


