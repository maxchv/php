<?php declare(strict_types=1);

echo "<h2>Object-oriented programming</h2>";

// Класс, Конструкторы, Деструкторы, Инкапсуляция
abstract class Animal {
    public $name;
    protected $kind;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo "some {$this->name} is born<br/>";
    }

    public function __destruct()
    {
        echo "some {$this->name} died<br/>";
    }



    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}

$ao = new ArrayObject();

//$animal = new Animal("Cat", 1);
//$animal->name = "Cat";
//echo "It is {$animal->name}<br/>";
//var_dump($animal);

// Абстрактный класс

// Константы

// Статические поля и методы

// Наследование классов
class Cat extends Animal
{

}

$cat = new Cat("Мурка", 1);
var_dump($cat);
echo "age: " . $cat->getAge() . "<br/>";

// Вызов методов родительского класса

// Интерфейс

// Наследование интерфейсов

// Магические методы

// Итераторы объкетов

// final

// Клонирование объектов

// Контроль типа

// Исключения

// Пространства имен

// Автозагрузка  классов

// Трейты
