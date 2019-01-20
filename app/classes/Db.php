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

    public function query(string $sql, array $params = array(), bool $emulate = true)
    {
        echo $sql;
        $result = null;

        try
        {
            $result = parent::query($sql, $params, $emulate);
        }
        catch (\PDOException $exception)
        {
            echo $exception->getMessage();
        }

        return $result;
    }

    public function read($table, $cols = "*", $where = null, $count = false, $order_by = null, $how = "ASC", $limit = null)
    {
        $sql = ($count) ? "SELECT COUNT({$cols}) FROM {$table}" : "SELECT {$cols} FROM {$table}";
        $sql .= ($where !== null) ? " WHERE ".$this->whereToStr($where) : "";
        $sql .= ($order_by !== null) ? " ORDER BY {$order_by} {$how}" : "";
        $sql .= ($limit !== null) ? " {$limit}" : "";

        return $this->query($sql, $where);
    }

    private function whereToStr($array, $templates = true)
    {
        $res = "";

        if ($templates)
        {
            foreach ($array as $index => $item)
            {
                $res .= "{$index} = :{$index} AND ";
            }
            $res = substr($res, 0, -5);
        }
        else
        {

        }

        return $res;
    }
}