<script type="text/javascript" src="skins/default/js/scripts_v1.js"></script>
<?php
if (password_verify('lalala', '$2y$10$aAfvFN.Ow7uRXS54utgpyu8YgMvth1CH.KgYvvxNFUyPu5j4u6TJa')) {
    wtf(111);
}else {
    wtf(222);
}
/*
str_replace('Vasy','K999','Vasyaa lubit Hui');



$replace_word = 'арбузы';


//Структура паттерна:

$pattern = '#поиск по шаблону#свойства или модификаторы';


 * Функции:
preg_replace - делает замену слова
preg_match - ищет 1 совпадение
preg_match_all - ищет все совпадения
preg_quote принимает перечень символов и экранизирует(добавляет слеш) delimeter -?

Свойства, модификаторы:
i - регистронезависимый поиск, большая и маленькая буква (Не по умолчанию) (а - маленькая - по умолчанию)
u - UTF-8 по умолчанию, кроме англ или цифры
s - \s - символы
U - отмена жадного поиска


[] - перечисляем, какой из символов может находится тут (1)
^ - отрицание, точно не этот символ ^и
а-яё - от а до я
а-Яё - и большие и маленькие буквы(если не используем свойство "i")
a-z
0-9
0-15 = [01][0-9] 00-19

#^ - от начала строки
$# - от конца строки

 * Замена слов в строке
$text = 'Вася любит ананасы. Петr любит кораблик. Путин Хуйло. А на юге живут папуасы';
echo $text.'<br><hr>' ;
$text = preg_replace('#пет[а-яёa-z] любит#ui','ЗАМЕНА', $text);

echo $text;


$text = 'Вася любит ананасы. Петя любит кораблик. Петв любит Хуйло. А на юге живут папуасы';
echo $text.'<br><hr>' ;
$count = preg_match('#пет[а-яёa-z] любит#ui',$text,$matches);

echo '<pre>'.print_r($matches,1).'</pre>';


if(preg_match('#^а[а-я][а-я][а-я][а-я]евж$#ui',$text)) {
    echo 'Мы нашли!';
} else {
    echo 'Беда';
}

Повторения
{4} 4 повторения

В{1}а{1}с{1}я{1} <- Вася
В{5} <- ВВВВВ
{min,max}
{1,2} - от 1 до 2 символов
{0,}  - от 0 до бесконечности

Сокращения колличества

{0,}  * - от 0 до бесконечности , может и не быть буквы  <-  *   Вас [а-яё]*
{1,}  + - от 1 до бесконечности
{,5}    - до 5 символов, не больше
{1}     - ничего не указываем
{0,1} ? - от 0 до 1, может быть или не быть <- Вася? - допустимо Вас или Вася

Сокращения символов


\s - пробел,табуляция,перенос строки
$count = preg_match_all('#Вася\s+[а-яё]+#ui',$text,$matches);
. - абсолютно любой символ
\. - точка
.{3} - три любых символа
(Стас){5} - СтасСтасСтасСтасСтас повторение определенного слова



\d - числа [0-9]
\w - [-A-ZA-Я_]

[\dа-я]*

'#1{2}3{3}[а-я]{0,1}#';

'[0-9] {1,} <= \d?';



| - или или - разделение того, что находится в собках
(кармашек) - вписывается искомое слово $count = preg_match_all('#(\w+)\sананасы#ui',$text,$matches);, выводится по примеру: echo $matches[1][0];
$matches[0] - выводит всю поисковую строчку

\\0 -обращение к 1 кармашку, можно заменить найденное слово на самого же себя, обращаясь через \\0 к примеру , можно выделить жирным <b>\\1</b>
\\1

$var = 10;

0-100  = '#^([0-9]{1,2}|100)$#'; от начала до конца

[0-9]{2} - от 1 до 99
0-255
0-99
100-199
20-255
ip = [0-9]{1,2}|1[0-9]{2}|2([0-4][0-9]|5[0-5])\.[0-9]{1,2}|1[0-9]{2}|2([0-4][0-9]|5[0-5])\.[0-9]{1,2}|1[0-9]{2}|2([0-4][0-9]|5[0-5])\.[0-9]{1,2}|1[0-9]{2}|2([0-4][0-9]|5[0-5])


$i = 255;
if($i >=0 && $i <=255)


preg_quote принимает перечень символов и экранизирует(добавляет слеш)



$text = 'Вася любит ананасы. Петя любит кораблик. Путин Хуйло. А на юге живут папуасы';
echo $text.'<br><hr>' ;
$count = preg_replace('#(\w+)\s(ананасы)#ui','<b>\\1</b>',$text);

echo '<hr>'.$count;

U - отмена жадного поиска, берет максимально мало
жадный поиск - максимально возможно много берет
применяется при парсинге страницы

$text = 'Вася любит ананасы. Петя любит <b>кораблик.</b> Петв любит Хуйло. <b>А на юге </b>живут папуасы';
echo $text.'<br><hr>' ;
$count = preg_match_all('#^.{5,15}#uiU',$text,$matches);

echo '<pre>'.print_r($matches,1).'</pre>';
echo $matches [1][0];


session_start();
echo '<pre>';
print_r($_COOKIE);
print_r($_SESSION);
echo '</pre>';



//Проверка логина

$text = 'inpost';
if(trim($text) != $text) {
    echo 'Не ставьте пробелы в начале и в конце логина';
} else {
    if(preg_match('#^[\wё\s]{3,18}$#ui',$text)){
        echo 'Верный логин';
    }else {
        echo "Не верный логин";
    }
}

*/
function wtf($array, $stop = false) {
    echo '<pre>'.print_r($array,1).'</pre>';
    if(!$stop) {
        exit();
    }
}
$var = 10;
?>


<script>
$var = '<?php echo (int)$var;?>';

var users = {
    'user1' : {
        'Имя' : 'Александр',
        'Nick' : 'Pilotka',
        'age' : 32,
        'skill' : 1000500
    },
    'user2' : {
        'Имя' : 'Петя',
        'Nick' : 'Коля',
        'age' : 36,
        'skill' : 10600
    },
    'user3' : {
        'Имя' : 'Валя',
        'Nick' : 'Нос',
        'age' : 17,
        'skill' : 100
    },
};
//console.log('Пользователь : ' + users.user1.Nick + ' ' + users['user1']['age']);


// for(key in users) {
//     //console.log(users[key].Имя + ':' + users[key].Nick + ', ' + users[key].age)
// }
// var i = 0;
// while(i < 3) {
//     if(++i%2) {
//         console.log(i*2);
//     } else {
//         console.log(i+1);
//     }
// }

var i = 0;
while(i < 3) {
    if(++$i%2==0) {
        console.log(i*2);
    } else {
        console.log(i+1);
    }
}

    /*
alert('Hello World');
 без $;
 конкатенация = символ + вместо .
 ; ставить не обязательно
x=1;
y=2;
result = x + y; // сложение
alert(x+'+'+y+'='+result);

//Циклы
x=1;
while (x<3) {
    //alert(x);
    ++x;
}
for ..in аналог foreach, для обьектов
prompt()- просьба что то ввести
x =  prompt('Сколько вам лет', '18');
alert(x);
confirm - подтверждение какого либо действия
if(confirm('Delete?')) {
    //запрос на сервер, удаление
    alert('вы согласились');
} else {
    alert('вы отказались');
}

var x - локальная (не видна во внешней среде(только в функции), чтобы не затирали переменные глобальные)
x - глобальная
parseInt('12px') // 12 приведение к типу integer  (int)
parseFloat('6px') // 6 приведение к типу float

y = 3;
function calc (num1,num2,action) {
    //значение по умолчанию
    if(action == undefined) {
        action = 'plus';
    }
    y = 1;
    var res = 0;
    if(action == 'plus') {
        res = num1 + num2;
    }
    if(action == 'minus') {
        res = num1 - num2;
    }
    return res;
}
alert(y);
x = calc(1000150,999999999999,'minus');
alert(y);
y = 7;
alert(y);
Урок 34
Ссылаемся на обьект
<div id = "lalala"> = у всех уникальный
либо обращаться через точку по дереву к обьекту- html.body.div.form.input
id = "lalala".form[0]- 1 форма
window -  окно браузера(не обязательно указывать), document - содержание
window.document.body.div.text
document.getElementById('xxx')- обращение сразу к элементу
innerHTML - текст внутри div
x=5; - set
alert(x) - get
set - даём значение
get - получаем значение
 document.getElementById('xxx').innerHTML = 'Что хотим, то и пишем';
 x = document.getElementById('xxx').innerHTML; - GET , и его помещаем в переменную
        document.getElementById('xxx').innerHTML = 'Что хотим, то и пишем';
        document.getElementById('xxx').style.backgroundColor = 'red';
        alert(3);
        document.getElementById('xxx').style.display = 'none';
        alert(4);
        document.getElementById('xxx').style.display = ''; - оригинальное значение - block
событие onclick="" - внутри кавычек идёт всё, что мы написали в <script>
onclick="alert('Ура!')"
<div id="xxx" style="background-color: yellow ;display: block">хуй</div>
<div style="font-size: 16px;" onclick="hide();">Нажми</div>
<script>
    function hide()  {
        if (document.getElementById('xxx').style.display == 'block') {
            document.getElementById('xxx').style.display = 'none';
        } else  {
            document.getElementById('xxx').style.display = 'block';
        }
    }
    function hide()  {
    x = document.getElementById('xxx');
    if (x.style.display == 'block') {
        x.style.display = 'none';
    } else  {
        x.style.display = 'block';
    }

<input id = "aaa" type="checkbox" checked="checked">
document.getElementById('aaa').checked == 'checked'
дерево формируется с верху в низ
консоль ошибок в браузере ctrl+shift+j
<div id="xxx" style="background-color: yellow ;display: block">хуй</div>
<div style="font-size: 16px;" onclick="hideShow();">Нажми</div>

    function hideShow()  {
       var x = document.getElementById('xxx');
        if (x.style.display == 'block') {
            x.style.display = 'none';
        } else  {
            x.style.display = 'block';
        }
    }
else if
по загрузке window.onload = function () { } происходит событие
onclick="alert(1); return false" - останавливает стандартное действие браузера(переадресация не осуществляется)
console.log - можем мониторить загрузку скрипта без alert
запрос у сервера новой информации за какой то период для чата
5-7 секунд
интервал вызывает
setInterval(test,1000) / что делаем, время - 1000 = 1с
var intervalID = setInterval(test(),2000);
clearInterval(intervalID); // останавливает интервал
чтобы передавать аргументы в функцию, нужно создать пустую функцию
var intervalID = setInterval(function() {test('lala','jjd'); hide();},2000);

setTimeout - вызывается 1 раз через то время, чтомы указали
intervalID = setTimeout(test,2000);
var users = { //обьект}
var users = { 'Вася' : 'Пупкин', 'key2' : 'value2' };
alert(users['Вася']);//Вызов обьекта
alert(users.key2);//Вызов обьекта
var users = {
    'user1' : {
        'Имя' : 'Александр',
        'Nick' : 'Pilotka',
        'age' : 32,
        'skill' : 1000500
    },
    'key2' : 'value2'
};
//console.log('Пользователь : ' + users.user1.Nick + ' ' + users['user1']['age']);


for(key in users.user1) {
    console.log(users.user1[key])
}

*/




</script>
<a href="http://google.com" onclick="return areYouSure();">Delete</a>
<!--<form action="http://google.com" method="get" onsubmit="return del()">-->
<!--    <input type="text" id="sendtext" value="">-->
<!--    <input type="submit" value="Delete">-->
<!--</form>-->
<div id="xxx" style="background-color: yellow">хуй</div>
<div style="font-size: 16px;" onclick="hideShow('xxx')">Нажми</div>
<!---->
<!---->
<!--<div id="1" style="background-color: yellow ;display: block">хуй1</div>-->
<!--<div style="font-size: 16px;" onclick="hideShow('1')">Нажми</div>-->















