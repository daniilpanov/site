<?php
namespace app\classes;

class Factory
{
    private static $instances = array();

    public static function getInstance(string $class)
    {
        // По принципу Singleton с доп. функциями
        // Если нам надо создать указанный объект, то
        if (!isset(self::$instances[$class]))
        {
            // Пробуем создать этот объект
            try {
                // Если класс не указан, то
                if ($class == '' OR $class === null)
                {
                    // генерируем исключение
                    throw new \Exception("Invalid class name");
                } // А если указанный класс существует, то
                elseif (class_exists($class_full_name = "\\app\\classes\\" . $class))
                {
                    // присваеваем элементу статического массива объект нужного класса
                    self::$instances[$class] = new $class_full_name();
                } // Иначе
                else
                {
                    // генерируем исключение
                    throw new \Exception("This class not found");
                }
            }
            catch (\Exception $e)
            {
                echo $e->getMessage();
            }
        }

        return self::$instances[$class];
    }
}