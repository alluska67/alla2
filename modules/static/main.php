<?php





/*

class myName1 {
    //свойство
    static $opasity = 100;
    static $size = 30;
    //метод
    static function makeLine1(){
        echo 'Тест';

    }
    static function makeLine2(){
    }
    static function makeLine3(){
    }

}

echo myName1::$opasity;
echo myName1::makeLine1(1);



class MyName2 {
    static $opasity = 100;
    static $size = 30;

    static function makeLine1(){
    }
    static function makeLine2(){
    }
    static function makeLine3(){
    }
}

class paginator {
    static $homepages = 9;
    static $shownumbers = 'true';
    static $shownext = 'true';

    static function showPaginator (int $var){
        self::$homepages;
        if(self::$homepages==5){
            echo 'Хер';
        }
        echo '1,2,3,4';
    }
}
paginator::showPaginator(1);
echo '<hr>';

paginator::$homepages = 5;
paginator::showPaginator(1);
echo '<hr>';

*/
//static -ссылаемся где-угодно к переменной self::$homepages, paginator::showPaginator(1);
//public - создаем псевдо копию класса - new внутри переменной , и они не пересекаются $this->radius - ссылаемся к экземпляру echo $ill1->radius; эта переменная внутри других функций уже не видна!
//private
//protected
/*
class Illustrator {
    public $radius = 10;
    private $type = 'XML';
    public function makeGraphic() {
        return $this->radius;
    }
    public function changeRadius($radius) {
        $this->radius = $radius;

    }
    private function test() {

    }
}

$test = new Illustrator();
$test->lalalal = 'Эксперимент';
printR($test);



$ill1 = new Illustrator();
$ill2 = new Illustrator();
$ill3 = new Illustrator();
$ill1->changeRadius(88);
$ill2->changeRadius(33);
$ill3->changeRadius(22);

echo $ill1->makeGraphic();
echo '<hr>';
echo $ill2->makeGraphic();
echo '<hr>';
echo $ill3->makeGraphic();
 */





