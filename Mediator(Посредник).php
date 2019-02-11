Когда вы разговариваете с кем-то по телефону, это никогда не происходит напрямую. Между вами и собеседником находится
провайдер, и в этом случае поставщик мобильных услуг является посредником.
<?php
interface ChatRoomMediator
{
    public function showMessage(User $user, string $message);
}
// Посредник
class ChatRoom implements ChatRoomMediator
{
    public function showMessage(User $user, string $message)
    {
        $time = date('M d, y H:i');
        $sender = $user->getName();
        echo $time . '[' . $sender . ']:' . $message;
    }
}
class User {
    protected $name;
    protected $chatMediator;
    public function __construct(string $name, ChatRoomMediator $chatMediator) {
        $this->name = $name;
        $this->chatMediator = $chatMediator;
    }
    public function getName() {
        return $this->name;
    }
    public function send($message) {
        $this->chatMediator->showMessage($this, $message);
    }
}
$mediator = new ChatRoom();

$john = new User('Джон', $mediator);
$jane = new User('Джейн', $mediator);

$john->send('Здравствуй!');
$jane->send('Привет!');

// Output will be
// Feb 14, 10:58 [Джон]: Здравствуй!
// Feb 14, 10:58 [Джейн]: Привет!