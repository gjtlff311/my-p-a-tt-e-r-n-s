Строим дом. Этапы работы выглядят так:

подготовка фундамента;
строительство стен;
добавление крыши;
добавление необходимого количества этажей.
Порядок неизменен, но можно изменить каждый из этапов отдельно. Например, стены могут быть из камня или из дерева.

Предположим, есть инструмент для сборки, который позволяет тестировать программу, анализировать, генерировать отчеты и т. д.
Создадим базовый класс-скелет:
<?php
abstract class Builder
{
    // Шаблонный Метод
    final public function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }
    abstract public function test();
    abstract public function lint();
    abstract public function assemble();
    abstract public function deploy();
}
class AndroidBuilder extends Builder //ios - мобильная операционная система
{
    public function test()//android - мобильная операционная система
    {
        echo 'Старт Android тестов';
    }
    public function lint()
    {
        echo 'Анализ Android кода';
    }
    public function assemble()
    {
        echo 'Сборка Android';
    }
    public function deploy()
    {
        echo 'Развертывание Android';
    }
}
class IosBuilder extends Builder
{
    public function test()
    {
        echo 'Старт iOS тестов';
    }
    public function lint()
    {
        echo 'Анализ iOS кода';
    }
    public function assemble()
    {
        echo 'Сборка iOS';
    }
    public function deploy()
    {
        echo 'Развертывание iOS';
    }
}
$androidBuilder = new AndroidBuilder();
$androidBuilder->build();

$iosBuilder = new IosBuilder();
$iosBuilder->build();