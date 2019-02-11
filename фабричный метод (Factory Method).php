Невозможно одному человеку провести собеседования со всеми кандидатами на все вакансии
<?php
interface Interviewer// тот кто берет интерв'ю
{
    public function askQuestions();
}
class Developer implements Interviewer//разработчик 
{
    public function askQuestions()
    {
        echo 'Спрашивает про шаблоны проектирования!';
    }
}
class CommunityExecutive implements Interviewer //Общественные специалист
{
    public function askQuestions()
    {
        echo 'Спрашивает о работе с сообществом';
    }
}
///////////////////////////////////////////////
abstract class HiringManager //создаем команду,кот будет заниматься наемом работников
{
    // Фабричный метод
    abstract public function makeInterviewer(): Interviewer; //создаем интервьюверов

    public function takeInterview()//брать интерв'ю
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestions();
    }
}
class DevelopmentManager extends HiringManager //менеджер у программистов
{
    public function makeInterviewer(): Interviewer
    {
        return new Developer();
    }
}
class MarketingManager extends HiringManager //маркетинговый менеджер
{
    public function makeInterviewer(): Interviewer
    {
        return new CommunityExecutive();//общественный специалист
    }
}
$devManager = new DevelopmentManager();
$devManager->takeInterview(); // Вывод: Спрашивает о шаблонах проектирования!

$marketingManager = new MarketingManager();
$marketingManager->takeInterview(); // Вывод: Спрашивает о работе с сообществом
