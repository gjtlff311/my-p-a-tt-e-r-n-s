использует только один статический метод, чтобы создать все допустимые типы объектов
<?php
final class StaticFactory
{
/**
* @param string $type
*
* @return Formatter
*/
public static function factory(string $type): Formatter
{
    if ($type == 'number') {
    return new FormatNumber();
    } elseif ($type == 'string') {
    return new FormatString();
    }
    throw new \InvalidArgumentException('Unknown format given');
    }
}
interface Formtater
{
    public function format(string $input): string;
}
class FormatString implements Formatter
{
    public function format(string $input): string
    {
    return $input;
    }
}
class FormatNumber implements Formatter
{
    public function format(string $input): string
    {
    return number_format($input);
    }
}
$res = new FormatString();
print_r($res->format('sldkjgaldsk'));
$res = new FormatNumber();
print_r($res->format(35));