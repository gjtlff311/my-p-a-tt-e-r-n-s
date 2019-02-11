Представим, что у вас на карте памяти есть какие-то изображения и вам надо перенести их на ваш компьютер. Чтобы это сделать, вам нужен какой-то адаптер, который совместим с портами вашего компьютера. В этом случае карт-ридер — это адаптер. Другим примером будет блок питания. Вилку с тремя ножками нельзя вставить в розетку с двумя отверстиями. Для того, чтобы она подошла, надо использовать адаптер. Ещё одним примером будет переводчик, переводящий слова одного человека для другого.
<?php 
interface Lion
{
    public function roar();//рычать
}
class AfricanLion implements Lion
{
    public function roar()//рычать
    {
        return 'рычит';
    }
}
class AsianLion implements Lion
{
    public function roar()//рычать
    {
        echo 'рычит';
    }
}
class Hunter
{
    public function hunt(Lion $lion)
    {
        echo 'охотится';
    }
}
// Это надо добавить в игру
class WildDog
{
    public function bark()//лаять
    {
        echo 'лает';
    }
}
// Адаптер, чтобы сделать WildDog совместимой с нашей игрой 
class WildDogAdapter implements Lion { 
    protected $dog; 
    public function __construct(WildDog $dog) {
        $this->dog = $dog; 
    }
    public function roar() { 
        $this->dog->bark(); 
    }
}
$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);
$res =$wildDogAdapter->roar();//лает

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);//охотится

$lion = new AsianLion();
$lion->roar();//рычит