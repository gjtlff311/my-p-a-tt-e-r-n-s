Вы когда-нибудь заказывали чай в уличном ларьке? Там зачастуют готовят не одну чашку, которую вы заказали, а гораздо большую емкость. Это делается для того, чтобы экономить ресурсы (газ/электричество). Газ/электричество в этом примере и являются приспособленцами, ресурсы которых делятся (sharing).
Приспособленец используется для минимизации использования памяти или вычислительной стоимости путем разделения ресурсов с наибольшим количеством похожих объектов.
<?php 
// Все, что будет закешировано, является приспособленцем.
// Типы чая здесь будут приспособленцами.
class KarakTea
{
}
//Ведет себя как фабрика и сохраняет чай
class TeaMaker//тот,кто готовит чай
{
    protected $availableTea = [];
    public function make($preference)
    {
        if (empty($this->availableTea[$preference])) {
            $this->availableTea[$preference] = new KarakTea();
        }
        return $this->availableTea[$preference];
    }
}
class TeaShop// кафе,где принимаются и выполняются заказы:
{
    protected $orders;
    protected $teaMaker;
    public function __construct(TeaMaker $teaMaker)
    {
        $this->teaMaker = $teaMaker;
    }
    public function takeOrder(string $teaType, int $table)//принять заказ
    {
        //$teaType  = если есть  какие-то предпочтения,а если нету -готовим по рецепту
        $this->orders[$table] = $this->teaMaker->make($teaType);
    }
    public function serve()
    {
        foreach ($this->orders as $table => $tea) {
            echo "Serving tea to table# " . $table;
        }
    }
}
$teaMaker = new TeaMaker();
$shop = new TeaShop($teaMaker);

$shop->takeOrder('меньше сахара', 1);
$shop->takeOrder('больше молока', 2);
$shop->takeOrder('без сахара', 5);

$shop->serve();
// Подаем чай на первый стол
// Подаем чай на второй стол
// Подаем чай на пятый стол