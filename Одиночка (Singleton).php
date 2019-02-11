Обеспечивает тот факт, что создаваемый объект является единственным объектом своего класса.
тоесть у нас может быть только один экземпляр данного класа.нужно осторожно ипользовать данный паттерн
<?php
/**
 * Одиночка
 */
final class Product
{
    /**
     * @var self
     */
    private static $instance;
    /**
     * @var mixed
     */
    public $a;
    /**
     * Возвращает экземпляр себя
     *
     * @return self
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * Конструктор закрыт
     */
    private function __construct()
    {
    }
    /**
     * Клонирование запрещено
     */
    private function __clone()
    {
    }
    /**
     * Сериализация запрещена
     */
    private function __sleep()
    {
    }
    /**
     * Десериализация запрещена
     */
    private function __wakeup()
    {
    }
}
/*
 * =====================================
 *           USING OF SINGLETON
 * =====================================
 */
$firstProduct = Product::getInstance();
$secondProduct = Product::getInstance();

$firstProduct->a = 1;
$secondProduct->a = 2;

print_r($firstProduct->a);
// 2
print_r($secondProduct->a);
// 2
//////////////////////////////

final class President
{
    private static $instance;//экземпляр
    private function __construct()
    {
        // Прячем конструктор
    }
    public static function getInstance(): President
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone()
    {
        // Отключаем клонирование
    }
    private function __wakeup()
    {
        // Отключаем десериализацию
    }
    private function __sleep()
    {
    }
}
$president1 = President::getInstance();
$president2 = President::getInstance();
var_dump($president1 === $president2); // true