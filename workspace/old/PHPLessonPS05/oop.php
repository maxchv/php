<h2>Object-oriented programming</h2>
<?php

// Класс, Конструкторы, Деструкторы, Инкапсуляция
abstract class Animal {
	public $kind;
	protected $name;
	private $age;
	
	// конструктор
	public function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
		echo "constructor " . __CLASS__ . "<br/>";
		//echo "create new Animal <br />";
	}
	
	public function __destruct() {
		//echo "kill Animal <br />";
	}
	
	public function setAge($age) {
		$this->age = $age;
	}
	
	public function getAge() {
		return $this->age;
	}
	
	public abstract function say();
}

// Наследование классов
// Абстрактный класс
abstract class Pet extends Animal  {
	public function setName($n) {
		$this->name = $name;		
	}
	
	public function __construct($name, $age){
		parent::__construct($name, $age);
		echo "constructor " . __CLASS__ . "<br/>";
	}
}

// $animal = new Animal();
// $animal->kind = "Dog";

class Dog extends Pet {
	public function __construct($name, $age){
		parent::__construct($name, $age);
		echo "constructor " . __CLASS__ . "<br/>";
	}
	public function say() {
		
	}
}

$dog = new Dog('Bob', 1.5);

// Константы
class Circle {
	const PI = 3.14;
	private $radius;
	
	public function __construct($radius) {
		$this->radius = $radius;
	}
	
	public function Area() {
		return self::PI * ($this->radius) * ($this->radius);
	}
}

$c = new Circle(1);
echo "PI: " . $c::PI . "<br />";
echo "PI: " . Circle::PI . "<br />";
echo "S: " . $c->Area() . "<br/>";

// Статические поля и методы
class Student {
	private $id = 0;
	private static $count = 0;
	private $name;
	private $age;
	
	protected function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
		$this->id = ++self::$count;
	}
	
	public static function create($name, $age) {
		return new Student($name, $age);
	}
	
	public function __toString() {
		return "id: {$this->id}, name: {$this->name}, age: {$this->age}"; 
	}
}

$s = Student::create("Вася", 28);
echo $s, "<br />";
$s2 = Student::create("Маша", 25);
echo $s2, "<br />";

// Интерфейс
interface IShape {
	public function draw();
}

// Наследование интерфейсов
class Shape implements IShape {
	public function draw() {
		echo "draw shape <br />";
	}
}

// Магические методы
class MagicCls {
	private $valid_name = ['data', 'a', 'b'];
	private $data = array();
	
	public function __set($name, $data) {
		if(in_array($name, $this->valid_name)) {
			//echo "added new $name = $data <br />";
			$this->data[strtolower($name)] = $data;
		} else {
			echo "Go away<br/>";
		}
	}
	
	public function __isset($name) {
		return isset($this->data[$name]);
	}
	
	public function __get($name) {
		if(in_array($name, $this->valid_name)) {
			return $this->data[$name];
		} else {
			return null;
		}
	}
	
	public function __unset($name) {
		if(isset($this->data[$name])) {
			unset($this->data[$name]);
		}
	}
	
	public function __invoke() {
		echo "invoke this object<br/>";
	}
	
// 	public function getData() {
// 	if(isset($this->data['data'])) {
// 			return $this->data['data'];
// 		} 
// 	}

	public function __call($name, $args) {
// 		echo "try call method $name <br />";
// 		echo "arguments: <pre>";
// 		print_r($args);
// 		echo "</pre>";
	
		if(preg_match("/^get(\w+)/", $name, $match)) {
			if(isset($this->data[strtolower($match[1])])) {
				return $this->data[strtolower($match[1])];
			} else {
				return null;		
			}
		}
	}	
}

$mc = new MagicCls();
$mc->data = "Some data";
$mc->a = "lkajflk";
$mc->d = ';laijfdalk;';

$mc();

unset($mc->a);

echo "<pre>";
var_dump($mc);
echo "</pre>";

if(!empty($mc->data)) {
	echo $mc->data . "<br />";
}

echo $mc->d . "<br />";

echo $mc->getData();
$mc->a = "new a";
echo $mc->getA();

// Итераторы объкетов
class IterCls {
	public $a = 1;
	public $b = 2;
	protected $c = 3;
	private $d = 4;
	
	public static $count = 0;
	
	public function __construct() {
		++self::$count;
	}
	
	public function iter() {
		foreach ($this as $name => $value) {
			echo "\$this->$name = $value<br />";
		}
	}
	
	public function __clone() {
		++self::$count;
	}
}
echo "<br />";
$it = new IterCls();
foreach ($it as $name => $value) {
	echo "\$it->$name = $value<br />";
}
$it->iter();

// Клонирование объектов
$it2 = clone $it;
echo "\$it a: ", $it->a, " b:", $it->b, "<br />"; 
echo "\$it2 a: ", $it2->a, " b:", $it2->b, "<br />";
$it2->a = 100;
$it2->b = 200;
echo "\$it a: ", $it->a, " b:", $it->b, "<br />";
echo "\$it2 a: ", $it2->a, " b:", $it2->b, "<br />";

echo "count: " . IterCls::$count . "<br/>";

// Контроль типа
// array
// callable
// class
// iterface
// boolean
// int
// float
// string
function foo(array $arr): array {
	//if(is_array($arr)) {
		// logic
	//}
	return [];
}

//foo('string');
foo([]);

class MyException extends Exception {
	public function __construct($message) {
		parent::__construct($message);
	}
}

// Исключения
try {
	throw new MyException("error message");
} catch (Exception $ex) {
		echo "catch My Exception: " . $ex->getMessage() . "<br >";
} catch (MyException $ex) {
	echo "catch exception: " . $ex->getMessage() . "<br >";
} finally {
	echo "finally <br />";
}

class Cat {
	public function __construct() {
		echo "Cat in file: " . __FILE__ . "<br />";
	}
}

//require_once 'Animal/Dog.php';
//require_once 'Animal/Cat.php';

// Автозагрузка  классов
spl_autoload_register(function ($nameClass) {
	//echo "try call $nameClass <br />";
	require_once $nameClass.'.php';
});

// Пространства имен
use Animal\Dog as D;

$c1 = new Cat();
$c2 = new Animal\Cat();
$d1 = new D();

// Трейты
trait traitShowProps {
	public function showProp() {
		foreach ($this as $name => $value) {			
			echo "\$this->$name = $value<br />";
		}
	}
}

class Floor {
	public function __toString() {
		return "Floor";
	}
}

class House {
	use traitShowProps;
	
	private $price = 100000;
	private $address = "New York, ...";	
	private $floor;
	
	public function __construct() {
		$this->floor = new Floor(); 
	}
}
class Horse {
	use traitShowProps;
	
	private $name = "Буцефал";
	private $owner = "Шлема Македонский";
}

$cls = 'House';

$house = new $cls();
$house->showProp();

$cls = 'Horse';
$horse = new $cls();
$horse->showProp();


