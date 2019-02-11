<?php 
// типы дверей
interface Door
{
    public function getDescription();
}
class WoodenDoor implements Door
{
    public function getDescription()
    {
        echo 'Я деревянная дверь';
    }
}
class IronDoor implements Door
{
    public function getDescription()
    {
        echo 'Я железная дверь';
    }
}
// типы специалистов
interface DoorFittingExpert
{
    public function getDescription();
}
class Welder implements DoorFittingExpert //сварщик
{
    public function getDescription()
    {
        echo 'Я работаю только с железными дверьми';
    }
}
class Carpenter implements DoorFittingExpert // плотник
{
    public function getDescription()
    {
        echo 'Я работаю только с деревянными дверьми';
    }
}
interface DoorFactory //фабрика дверей
{
    public function makeDoor(): Door; //сделать дверь
    public function makeFittingExpert(): DoorFittingExpert; // сделать специалиста для єтой работі
}
// Деревянная фабрика вернет деревянную дверь и столяра
class WoodenDoorFactory implements DoorFactory // фабрика деревянных дверей инкапсулирует столяра и деревянную дверь,
{
    public function makeDoor(): Door //
    {
        return new WoodenDoor(); //тоесть в деревьяной фабрике мы можем сделать только деревьянную дверь,А НЕ ЖЕЛЕЗНУЮ
    }
    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();//и в дерев.фабрике мы использ.плотника,а не сварщика
    }
}
// Железная фабрика вернет железную дверь и сварщика
class IronDoorFactory implements DoorFactory{
    public function makeDoor(): Door
    {
        return new IronDoor();
    }
    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}
$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // Вывод: Я деревянная дверь
$expert->getDescription(); // Вывод: Я работаю только с деревянными дверями

// Аналогично для железной двери
$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // Вывод: Я железная дверь
$expert->getDescription(); // Вывод: Я работаю только с железными дверями