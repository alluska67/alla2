<?php
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
//function wtf($array, $stop = false) {
//    echo '<pre>'.print_r($array,1).'</pre>';
//    if(!$stop) {
//        exit();
//    }
//}

?>
<head>
    <script type="text/javascript" src="/skins/default/js/scripts_v1.js"></script>

</head>
<body onunload="alert('Уже уходишь?')">
caas
<form action="" method="post" enctype="multipart/form-data" style="background-color: #603a4e">
    <input type="file" name="file" value="выберите файл" accept="image/jpeg,image/jpg,image/png,image/gif,image/bmp">
    <input type="submit" name="submit" value="загрузить файл">
    <input type="checkbox" id = "aaa" style=" " onclick="hide('111')">Удалить
    </form>

    <div id = "111"  style="display:none;width: 150px;background-color: brown;height: 30px;position: fixed;margin-left: 370px;padding-bottom: 23px;float: left;">
        <p>Do you want to delete?</p>
    </div>

    <div id="click" style="font-size: 16px;" onclick = "hide('xxx')">Нажми!</div>
    <div id = "xxx" style="display: block" >text</div>




<!--    <script>-->
<!--        x = document.getElementById('xxx').innerHTML;-->
<!--        document.getElementById('xxx').innerHTML = 'Что хотим, то и пишем';-->
<!--        document.getElementById('xxx').style.backgroundColor = 'blue';-->
<!--        alert(document.getElementById('xxx').innerHTML)-->
<!---->
<!--        function calc (num1,num2,action) {-->
<!--            var res = 0;-->
<!--            if(action == undefined) {-->
<!--                action = 'plus';-->
<!--            }-->
<!---->
<!--            if(action == 'plus') {-->
<!--                res = num1 + num2;-->
<!--            }else if(action == 'minus') {-->
<!--                res = num1 - num2;-->
<!--            }-->
<!--            return res;-->
<!--        }-->
<!--        x = calc(1,2);-->
<!--        alert(x);-->
<!--        y = calc(2,3,'minus')-->
<!--        alert(y);-->
<!--     </script>-->


<!--<a href="http://www.google.com" onclick="alert(1); return true;">Google</a>-->
<!---->
<!--<a href="http://www.google.com" onclick="return areYouSure()">Google</a>-->
<!---->
<!--<form action="http://www.google.com" method="get" onsubmit="return areYouSure();">-->
<!--    <input type="text" id="key" value="">-->
<!--    <input type="submit" value="Delete">-->



</body>



