  <!-- PHP не поддерживает множественное наследование!!!! -->

 <?php 
// Кофеварка
class CoffeeMaker
{
    public function getCoffee()
    {
        return 'кофе';
    }
}
// Взбиватель сливок
class СreamMaker
{
    public function getСream()
    {
        return 'сливки';
    }
}
// Кофемашина. Пытаемся отнаследовать функционал первых двух классов

// Теперь это уже композиция 
class CoffeMashin  
{ 
    protected $coffeeMaker, $creamMaker; 

    public function __construct()  
    {    
        $this->coffeeMaker = new CoffeeMaker;   
        $this->creamMaker  = new СreamMaker; 
    }  

    protected function getCoffee() 
    { 
        return $this->coffeeMaker->getCoffee(); 
    } 

    protected function getСream() 
    { 
        return $this->creamMaker->getСream(); 
    } 
     
    public function getCappuccino()  
    {  
        $coffe = $this->getCoffee();  
        $cream = $this->getСream();  
        return $coffe .' + '. $cream;  
    } 
}  

$mashin = new CoffeMashin; 

echo $mashin->getCappuccino(); 


echo (new CoffeMashin)->getCappuccino();
