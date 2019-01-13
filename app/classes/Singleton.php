<?php
namespace app\classes;


trait Singleton
{
    // Статическое свойство класса для хранения объекта этого же класса
    private static $instance = null;
    /**
     * Метод для получения объекта этого класса (setter)
     * @return self
     */
    public static function getInstance()
    {
        // Если объект ещё не создан
        if (self::$instance === null)
        {
            // создаём его
            self::$instance = new self();
        }
        // Возвращаем объект
        return self::$instance;
    }

    // Делаем невозможным создание объекта класса за пределами этого класса
    private function __construct()
    {
        // Do something...
    }
}