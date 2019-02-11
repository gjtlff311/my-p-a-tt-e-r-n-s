<?php
class User
{
    private $id;
    private  $counter=0;

    function __construct()
    {
        $this->counter++;
        $this->id=$this->counter;
    }

    function getCounter()
    {
        return $this->counter;
    }
    function getId()
    {
        return $this->id;
    }
}

$user1 = new User;
echo "Id первого пользователя: " . $user1->getId() . "<br />";
$user2 = new User;
echo "Id второго пользователя: " . $user2->getId() . "<br />";
echo "Всего пользователей: " .  $user1->getCounter();