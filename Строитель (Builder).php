отличие строителя от простой фабрики втом, что здесь несколько шагов ,а там - только один
когда есть варианты как сделать,построить что-то!!!
<?php
class Burger
{
    protected $size;

    protected $cheese = false;
    protected $pepperoni = false;
    protected $lettuce = false;
    protected $tomato = false;

    public function __construct(BurgerBuilder $builder)
    {
        $this->size = $builder->size;
        $this->cheese = $builder->cheese;
        $this->pepperoni = $builder->pepperoni;
        $this->lettuce = $builder->lettuce;
        $this->tomato = $builder->tomato;
    }
}
class BurgerBuilder// Строитель бургера.
{
    public $size;
    public $cheese = false;
    public $pepperoni = false;
    public $lettuce = false;
    public $tomato = false;
    public function __construct(int $size)
    {
        $this->size = $size;
    }
    public function addPepperoni()
    {
        $this->pepperoni = true;
        return $this;
    }
    public function addLettuce()
    {
        $this->lettuce = true;
        return $this;
    }
    public function addCheese()
    {
        $this->cheese = true;
        return $this;
    }
    public function addTomato()
    {
        $this->tomato = true;
        return $this;
    }
    public function build(): Burger
    {
        return new Burger($this);
    }
}
$burger = (new BurgerBuilder(14))
                    ->addPepperoni()
                    ->addLettuce()
                    ->addTomato()
                    ->build();
?>
<pre><?php print_r($burger);?></pre>