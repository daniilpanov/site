<?php
namespace app\classes;


class Db extends DbQueries
{
    //
    private static $all_instances = array();

    //
    use Singleton;

    // При создании объекта вызываем метод open_connection
    private function __construct()
    {
        $this->DSN =
            "mysql:host=".Settings::getSetting(
                'DBHost').";dbname=".Settings::getSetting(
                    'CurrentDB').";charset=".Settings::getSetting(
                        'MySQLCharset');

        $this->openConnection();
    }

    public static function openNewConnection()
    {
        $new_instance = new self();

        self::$instance = $new_instance;
        self::$all_instances[] = array(
            "User_name" => Settings::getSetting("CurrentUser")['name'],
            "Database" => Settings::getSetting("CurrentDB"),
            "instance" => $new_instance
        );

    }
}