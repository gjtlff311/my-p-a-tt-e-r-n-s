<?php
////№1////////////////
class CellectionEnqueue{
    public function enqueue($value) {
        $this->val[] = $value;
        return $this->val;
    }
    public function dequeue($value){
        foreach($value as $val){
            $this->val =array_shift($val);
        }
        return $this->val;
    }
    public function size($a){
        print_r( count($a));
    }
}
$test = new CellectionEnqueue();
$test->enqueue(222);
$test->enqueue(444);
print_r($test);
$res = (array)$test;
$test->dequeue($res);
$test->size($test);
print_r($test);
////№2////////////////
function findClosest($a)
{
    $b = [];
    for ($i = 0; $i <count($a)-1; $i++) {
        $res = sqrt((pow(($a[$i + 1][0] -$a[$i][0]), 2)) + (pow(($a[$i + 1][1] - $a[$i][1]), 2)));
        array_push($b,$res);
    }
    return $b;
}
$a = array(array(0 => 0, 1 => 1), array(0 => 1, 1 => 3), array(0 => 2, 1 => 12), array(0 => 3, 1 => 12), array(0 => 4, 1 => 4));
var_dump(findClosest($a));
?>
    <pre><?php print_r(findClosest($a));?></pre><?php
//////////№3///////////

function calcword($str){
    $a=[];
    for ($i = 0; $i < str_word_count($str); $i++){
        $exploded = explode(' ',$str);
        $res =mb_substr_count($str, $exploded[$i]);
        array_push($a,$res);
    }
    return $a;
}
$str = "df dd ff df ffff dz";
print_r(calcword($str));
//$line = "dfa adsfasdf asdfa fhgfh hhdhdghhgf hgh jfghgf";
//preg_match("/\bVi\b/i", $line, $match);
//      print_r( $match);
//////////№4///////////
$html = "dddasdfdddasdffff";
$needle = "asdf";
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}
// Displays 3 and 10
//Вывести все числа, меньшие 10000, у которых есть хотя бы одна цифра 3 и которые не делятся на 5.
foreach ($positions as $value) {
    echo $value ."<br />";
}
//////#5////////////////
/// рандомные числа без повторений
/// Вывести 3 случайных числа от 0 до 100 без повторений.
$randCount = 15; //Количество элементов массива
$randMin = 0; //Минимальное рандомное число
$randMax = 20; //Максимальное рандомное число
$randArray = array(); //Инициализируем массив

/**
 * Цикл будем повторять до упора.
 * Важно! Если rage (интервал), между $randMin и $randMax
 * будет меньше $randCount, цикл будет бесконечным!
 * Это очень важное замечание, так что решение "не для всех"
 * Однако, снабжено комментариями ;)
 */
while (true) { //Погнали
    $rand = rand($randMin, $randMax); //Формируем рандомное число
    if (!in_array($rand, $randArray)) { //Если такого числа в массиве нет
        $randArray[] = $rand; //Добавляем его
        if (sizeof($randArray) + 1 == $randCount) { //Если массив заполнен до упора
            break; //Выходим из цикла
        }
    }
}
print_r($randArray);
foreach($randArray as $randArr){
    echo $randArr.'<br>';
}//Выводим массив
////#6///////Счастливые билеты и их процент
/// Вывести на экран все шестизначные счастливые билеты. Билет называется счастливым, если сумма первых трех цифр
///  в номере билета равна сумме последних трех цифр. Найдите количество счастливых билетов и  процент от общего числа билетов.
$array_good =[];
$array_bad =[];
for($i=0;$i<=100;$i++) {
    $rand = rand(100000, 1000000);
    if (strlen($rand) == 6) {
        $splited_array = str_split($rand);
        if (($splited_array[0] + $splited_array[1] + $splited_array[2]) === ($splited_array[3] + $splited_array[4] + $splited_array[5])) {
            $array_good[]=$rand;
        }else{
            $array_bad[]=$rand;
        }
        $count_good = count($array_good);
        $count_bad = count($array_bad);
    }
}
$pourcent = (100*$count_good/$count_bad);
echo $pourcent;
print_r($array_good);
//////#7//ПРЯМОУГОЛЬНЫЕ ТРЕУГОЛЬНИКИ///Количетсво//
/// Найдите количество прямоугольных треугольников со сторонами, меньшими 100.
$count=0;
for($i=1;$i<=50;$i++){
    for($j=1;$j<=50;$j++){
        for($g=1;$g<=50;$g++){
            if((pow($i,2)+pow($j,2))=== pow($g,2)){
                echo 'AC= '.$i. 'AB= '.$j.'BC='.$g.'<br>';
                $count+=1;
            }
        }
    }
}
echo $count;
////#8///0/1/2//////
/// Вывести n случайных серий из чисел 0, 1 и 2 таких, что сумма чисел в каждой серии равна s. Найти количество единиц
///  в каждой серии, количество двоек в каждой серии, длину каждой серии, среднее количество двоек в сериях, среднюю
///  длину серий и наибольшее количество ненулевых чисел в сериях. В случае некорректности n и k вывести слово 'Ошибка'.
$array =[];
for($i=0;$i<=100;$i++) {
    for($j=0;$j<=3;$j++) {
        $array[$j] = rand(0, 2);
    }
    if (((array_sum($array)) === 5) ) {
        ?>
        <pre><?php print_r($array);
        ?></pre><?php
    }
}
////#9//Масивы/чередуется 0,1//
/// Заполнить массив длины n нулями и единицами, при этом данные значения чередуются, начиная с нуля.
$array=[];
for($i=0;$i<=10;$i++){
    for($j=0;$j<=1;$j++){
        $array[]=$j;
    }
}
print_r($array);
///#10//
/// Cоздать массив из n чисел, каждый элемент которого равен квадрату своего номера.
$array=[];
for($i=0;$i<=10;$i++){
    $array[]=pow($i,2);
}
print_r($array);
////#11///////
/// Найдите сумму и произведение элементов массива. Реализовать двумя способами: с помощью стандартных функций и без.
$array=[];
for($i=1;$i<=10;$i++){
    $array[]=$i;
}
print_r($array);
shuffle($array);
print_r(array_sum($array));
print_r(array_product($array));
$arr_sum=0;
for($j=1;$j<count($array);$j++){
    $arr_sum+=$array[$j];
}
$arr_mn=1;
for($j=0;$j<=count($array)-1;$j++){
    $arr_mn*=$array[$j];
}
echo '<br>';
echo $arr_sum;
echo '<br>';
echo $arr_mn;
echo '<br>';
print_r($array);
/////#12//////////
/// Определите, есть ли в массиве повторяющиеся элементы.
$array=[8,4,3,7,2,7,1,56];
$res = array_count_values($array);
?>
    <pre><?php print_r($res);?></pre><?php
echo '<br>';
foreach($res as $re){
    if($re>1){
        echo 'yes';
    }
}
/////#13//////////////////
/// Поменять местами наибольший и наименьший элементы массива
$array=[8,4,3,7,2,7,1,56];
$min = $array[0]; $index_min = 0;
$max = $array[0]; $index_max = 0;
for($i = 1; $i < count($array); $i++) {
    if($min > $array[$i]) {
        $min = $array[$i];
        $index_min = $i;
    }
    if($max < $array[$i]) {
        $max = $array[$i];
        $index_max = $i;
    }
}
echo 'Min: ' . $min . ', Max: ' . $max;
$array[$index_min] = $max;
$array[$index_max] = $min;
?>
<pre><?php print_r($array);?></pre><?php
//////#14//////////////
/// Упорядочить значения массива по возрастанию. Реализовать двумя способами: с помощью стандартной функции и без.
$array=[1,2,3,4,5,6,1,56];
for($i=0;$i<count($array);$i++){
    for($j=0;$j<count($array);$j++){
        if($array[$i]<$array[$j]){
            $el = $array[$j];
            $array[$j] = $array[$i];
            $array[$i] = $el;
        }
    }
}
?>
<pre><?php print_r($array);?></pre><?php
///////#15/////////////////
/// Определите, можно ли вычеркнуть из данного массива одно число так, чтобы оставшиеся числа оказались упорядоченными
///  по возрастанию.
$array=[1,2,3,4,5,6,1,56];
for($i=0;$i<count($array);$i++){
    if($array[$i]<$array[$i+1]) {
        unset($array[$i + 1]);
    }
}
?>
<pre><?php print_r($array);?></pre><?php
///#16/////
/// Удалите в массиве повторы значений. Например, для массива 1 2 4 4 2 5 результатом будет 1 2 4 5
$array=[1,2,3,1,4,5,6,1,56];
$res =array_unique($array);
?>
<pre><?php print_r($res);?></pre><?php
///#17//////
/// Дан массив из n элементов. а) Переставьте его элементы случайным образом. б) Переставьте его элементы случайным
///  образом так, чтобы каждый элемент оказался на новом месте.
//1 method
$array = [1,2,7,56];
$lastEl = array_pop($array);
echo $lastEl;
array_unshift($array,$lastEl);
?>
<pre><?php print_r($array);?></pre><?php
///2 method
$array =[1,2,5,7];
$shuffleKeys = array_keys($array);
?>
    <pre><?php print_r($shuffleKeys);?></pre><?php
shuffle($shuffleKeys);
$newArray = array();
foreach($shuffleKeys as $key) {
    $newArray[$key] = $array[$key];
}
for($i=0;$i<count($newArray);$i++){
    if($newArray[$i]==$array[$i]){
        shuffle($newArray);
    }
}
?>
    <pre><?php print_r ($newArray);?></pre><?php
////#18///////////
/// Даны два упорядоченных по возрастанию массива. Образовать из этих двух массивов единый упорядоченный по возрастанию массив.
$array1 =[1,2,3,7];
$array2 =[5,6,8,9];
$merged= array_merge($array1,$array2);
//$sorted = sort($merged);
for($i=0;$i<count($merged);$i++){
    for($j=0;$j<count($merged);$j++){
        if($merged[$i]<$merged[$j]){
            $el = $merged[$i];
            $merged[$i] =$merged[$j];
            $merged[$j]=$el;
        }
    }
}
?>
<pre><?php print_r($merged);?></pre><?php
////#19/////
/// Дан массив размера n. После каждого отрицательного элемента массива вставить элемент с нулевым значением.
$array =[1,2,-3,7];
for($i=0;$i<count($array);$i++){
    if($array[$i]<0){
        $array[$i+1]=0;
    }
}
?>
<pre><?php print_r($array);?></pre><?php
///#20/////
$main_arrays = array(
    array(
        'House' => 'Baratheon',
        'Sigil' => 'A crowned stag',
        'Motto' => 'Ours is the Fury',
    ),
    array(
        'Leader' => 'Eddard Stark',
        'House' => 'Stark',
        'Motto' => 'Winter is Coming',
        'Sigil' => 'A grey direwolf'
    ),
    array(
        'House' => 'Lannister',
        'Leader' => 'Tywin Lannister',
        'Sigil' => 'A golden lion'
    ),
    array(
        'Q' => 'Z'
    )
);
$keys_not_repeat =[];
$arr=[];
foreach($main_arrays as $main_key =>$main_array) {
    foreach ($main_array as $key => $array) {
        if (!in_array($key, $keys_not_repeat)) {
            array_push($keys_not_repeat, $key);
        }
        $arr[$key][]=$array;
    }
}
?>
<table>
    <?php foreach($main_arrays as $main_key =>$main_array) {?>
        <?php foreach($main_array as $key =>$array) {?>
            <?php foreach($keys_not_repeat as $key_n_p =>$key_not_repeat) {?>
                <?php if($key_not_repeat ===$key){?>
                    <?php echo $main_array[$key_not_repeat];?>
                <?php }?>
            <?php }?>
        <?php }?>
    <?php }?>
</table>
<?php
//echo '<table border="1" width="100%" cellpadding="5" cellspacing="0">';
//
//    echo '<tr align="center">';
//    foreach($keys_not_repeat as $key_n_pp => $key_not_repeat){
//        echo '<th>'.$key_not_repeat.'</th>';
//    }
//        echo '</tr>';
//foreach($keys_not_repeat as $key_n_p => $key_not_repeat) {
//
//    foreach ($arr[$key_not_repeat] as $ar_key => $ar) {
//        var_dump($ar);
////        echo $ar_key;
//        echo '<tr>';
//        if ($ar_key == $key_not_repeat) {
//            echo '<td>';
//            // for ($i = 0; $i <= 4; $i++) {
//            foreach ($arr[$key_not_repeat] as $key_final => $a) {
//                echo $key_final;
//            if($key_n_pp==$key_final){
//                 echo $a;
//            }
//             }
//            echo '</td>';
//        }
//        echo '</tr>';
//    }
//}
//    echo '</table>';


?>
<pre><?php print_r($arr);?> </pre>
<?php
sort($keys_not_repeat,SORT_STRING);?>
<table>   <tr>
        <?php foreach($keys_not_repeat as $key_not_repeat) {
            ?>
            <td>
                <?php echo $key_not_repeat . ' ||| '; ?>
            </td>
        <?php }?>
    </tr>
</table>
<table>
    <?php
    foreach($keys_not_repeat as $key_not_repeat) {
        ?>
        <td><?php
        foreach($arr as $ar_key => $ar){
            if ($ar_key === $key_not_repeat) {?>
                <td><?php
                foreach($arr[$key_not_repeat] as $key_final =>$re){
                    echo $key_final. $re.'--';
                    ?>
                    <tr>
                    <?php echo $re.'--';?>
                    </tr><?php
                }?></td><?php
            }
            ?>
        <?php }
        ?>
        </td><?php
    }?>
</table>
<table><tr><td>
    <?php foreach($arr as $ar_key => $ar){?>
    <?php foreach($ar as $key => $re){?>
    <tr>
        <?php echo $re;?>
    </tr>
    <?php }?>
    <?php }?>
    </td></tr></table>
<?php





