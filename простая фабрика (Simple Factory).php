используется,когда создание занимает один шаг
если больше шагов -- используется СТРОИТЕЛЬ
<?php
interface Door
{
    public function getWidth(): float;
    public function getHeight(): float;
}
class WoodenDoor implements Door
{
    protected $width;
    protected $height;
    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function getWidth(): float
    {
        return $this->width;
    }
    public function getHeight(): float
    {
        return $this->height;
    }
}
class DoorFactory
{
    public static function makeDoor($width, $height): Door
    {
        return new WoodenDoor($width, $height);
    }
}
$door = DoorFactory::makeDoor(100, 200);
$door2 = DoorFactory::makeDoor(150, 250);
echo 'Width: ' . $door->getWidth();
echo 'Height: ' . $door->getHeight();
echo 'Width: ' . $door2->getWidth();
echo 'Height: ' . $door2->getHeight();
//class CellectionEnqueue{
//    public function enqueue($value) {
//        $this->val[] = $value;
//        return $this->val;
//    }
//    public function dequeue($value){
//        foreach($value as $val){
//            $this->val =array_shift($val);
//        }
//        return $this->val;
//    }
//    public function size($a){
//        print_r( count($a));
//    }
//}
//$test = new CellectionEnqueue();
//$test->enqueue(222);
//$test->enqueue(444);
//print_r($test);
//$res = (array)$test;
//$test->dequeue($res);
//$test->size($test);
//print_r($test);
//////////////////////////////////
/// <?php
//
//function findClosest($a)
//{
//    $b = [];
//    for ($i = 0; $i <= count($a); $i++) {
//        $res = sqrt((pow((($a[$i + 1][0]) - ($a[$i][0])), 2)) + (pow((($a[$i + 1][1]) - ($a[$i][1])), 2)));
//        array_push($b,$res);
//    }
//    return $b;
//}
//$a = array(array(0 => 0, 1 => 1), array(0 => 1, 1 => 3), array(0 => 2, 1 => 12), array(0 => 3, 1 => 12), array(0 => 4, 1 => 4));
//var_dump(findClosest($a));
////////

function calcword($str){
    $a=[];
    for ($i = 0; $i < str_word_count($str); $i++){
        $exploded = explode(' ',$str);
        $res =substr_count($str, $exploded[$i]);
        array_push($a,$res);
    }
    return $a;
}
$str = "df dd ff df ffff dz";
print_r(calcword($str));