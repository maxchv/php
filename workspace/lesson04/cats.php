<?php
/**
 * Занятие #
 * Создание web–приложений, исполняемых на стороне сервера при помощи языка
 * программирования PHP,СУБД MySQL и технологии Ajax
 * shaptala@itstep.org
 * 24.11.2016
 */

class Cat
{
    private $age;
    private $name;

    /**
     * Cat constructor.
     * @param $age
     * @param $name
     */
    public function __construct(string $name, int $age)
    {
        $this->age = $age;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }
}


function compare_cats(array $cats, callable $cmp): bool
{
    return $cmp($cats[0], $cats[1]);
}
