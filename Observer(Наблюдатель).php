Люди, которые ищут работу, часто подписываются на сайты, где публикуются вакансии. Именно эти сайты уведомляют
соискателей о подходящих должностях, и именно так работают поведенческие паттерны Observer.
Есть соискатели:
<?php
interface IObservable {
    /**
     * Добавление нового наблюдателя
     *
     * @param IObserver $instance
     * @return bool
     */
    public function attach(IObserver $instance);//instance = копия
    /**
     * Удаление имеющегося наблюдателя
     *
     * @param IObserver $instance
     * @return bool
     */
    public function detach(IObserver $instance);
    /**
     * Оповещение всех наблюдателей, через вызов у него метода update
     *
     */
    public function notify();//уведомлять
}
interface IObserver {
    /**
     * Будет вызван у каждого наблюдателя в notify()
     *
     * @param IObservable $instance
     * @return mixed
     */
    public function update(IObservable $instance);
}
class WeatherGenerator implements IObservable {
    /**
     * Массив наблюдателей
     *
     * @var IObserver[]
     */
    private $observers = array();
    /**
     * Температура
     *
     * @var float
     */
    private $temperature;
    /**
     * Давление
     *
     * @var float
     */
    private $pressure;
    public function attach(IObserver $instance) {
        foreach ($this->observers as $observer) {
            if ($instance === $observer) {
                return false;
            }
        }
        $this->observers[] = $instance;
        return true;
    }
    public function detach(IObserver $instance) {
        foreach ($this->observers as $key => $observer) {
            if ($instance === $observer) {
                unset($this->observers[$key]);
                return true;
            }
        }
        return false;
    }
    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
    public function setParams($aTemperature, $aPressure) {
        $this->temperature = $aTemperature;
        $this->pressure = $aPressure;
        $this->notify();
    }
    public function getTemperature() {
        return $this->temperature;
    }
    public function getPressure() {
        return $this->pressure;
    }
}
class WeatherListener1 implements IObserver {
    private $currentTemperature;
    private $currentPressure;
    public function update(IObservable $instance) {
        $this->currentTemperature = $instance->getTemperature();
        $this->currentPressure = $instance->getPressure();
        $this->display();
    }
    public function display() {
        echo '<b>WeatherListener1</b> Текущая температура: '.$this->currentTemperature.'; Текущее давление: '.$this->currentPressure.'<br/>';
    }
}
class WeatherListener2 implements IObserver {
    private $currentTemperature;
    private $currentPressure;
    public function update(IObservable $instance) {
        $this->currentTemperature = $instance->getTemperature();
        $this->currentPressure = $instance->getPressure();
        $this->display();
    }
    public function display() {
        echo '<b>WeatherListener2</b> Текущая температура: '.$this->currentTemperature.'; Текущее давление: '.$this->currentPressure.'<br/>';
    }
}
$wl1 = new WeatherListener1();
$wl2 = new WeatherListener2();
$weatherGenerator = new WeatherGenerator();
$weatherGenerator->attach($wl1);
$weatherGenerator->attach($wl2);
$weatherGenerator->setParams(14, 770);
$weatherGenerator->setParams(16, 750);
$weatherGenerator->detach($wl1);
$weatherGenerator->setParams(17, 745);
//WeatherListener1 Текущая температура: 14; Текущее давление: 770
//WeatherListener2 Текущая температура: 14; Текущее давление: 770
//WeatherListener1 Текущая температура: 16; Текущее давление: 750
//WeatherListener2 Текущая температура: 16; Текущее давление: 750
//WeatherListener2 Текущая температура: 17; Текущее давление: 745