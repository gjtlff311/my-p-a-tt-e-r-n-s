Вы когда-нибудь использовали карту доступа, чтобы пройти через дверь? Есть несколько способов открыть дверь: например, она может быть открыта при помощи карты доступа или нажатия кнопки, которая обходит защиту. Основная функциональность двери — это открытие, но заместитель, добавленный поверх этого, добавляет функциональность. Но лучше я объясню это на примере кода чуть ниже.

Простыми словами: Используя шаблон заместитель, класс отображает функциональность другого класса.
<?php 
interface Door
{
    public function open();
    public function close();
}
class LabDoor implements Door
{
    public function open()
    {
        echo "Открытие дверь лаборатории";
    }
    public function close()
    {
        echo "Закрытие двери лаборатории";
    }
}
class Security
{
    protected $door;
    public function __construct(Door $door)
    {
        $this->door = $door;
    }
    public function open($password)
    {
        if ($this->authenticate($password)) {
            $this->door->open();
        } else {
            echo "Нет! Это невозможно.";
        }
    }
    public function authenticate($password)
    {
        return $password === '$ecr@t';
    }
    public function close()
    {
        $this->door->close();
    }
}
$door = new Security(new LabDoor());
$door->open('invalid'); // Нет! Это невозможно.

$door->open('$ecr@t'); // Открытие двери лаборатории
$door->close(); // Закрытие двери лаборатории