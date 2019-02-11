Рассмотрим пример сортировки пузырьком. Когда данных становится слишком много, такой вид сортировки становится очень медленным.
Чтобы решить проблему, мы применим быструю сортировку. Но хоть этот алгоритм и обрабатывает большие объемы быстро,
в небольших он медленный. Поведенческие паттерны Strategy позволяют реализовать стратегию, в которой совмещены оба метода.
<?php
interface SortStrategy
{
    public function sort(array $dataset): array;
}
class BubbleSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "Сортировка пузырьком";
        // Сортируем
        return $dataset;
    }
}
class QuickSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "Быстрая сортировка";
        // Сортируем
        //sort($dataset); - если хочу реально отсортировать
        return $dataset;
    }
}
class Sorter
{
    protected $sorter;
    public function __construct(SortStrategy $sorter)
    {
        $this->sorter = $sorter;
    }
    public function sort(array $dataset): array
    {
        return $this->sorter->sort($dataset);
    }
}
$dataset = [1, 5, 4, 3, 2, 8];

$sorter = new Sorter(new BubbleSortStrategy());
$sorter->sort($dataset); // Вывод : Сортировка пузырьком

$sorter = new Sorter(new QuickSortStrategy());
$ress=$sorter->sort($dataset); // Вывод : Быстрая сортировка
foreach($sorter->sort($dataset) as $key=>$res){
    echo $res;
}