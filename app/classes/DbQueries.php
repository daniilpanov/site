<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 12.01.2019
 * Time: 18:39
 */

namespace app\classes;


class DbQueries
{
    /**
     * @var $DBH \PDO
     * идентефикатор соединения,
     * @var $DSN string
     * для подключения к БД.
    ---------------------------
     * @var $OPT array
     * дополнительные параметры.
     */
    protected
        $DBH = NULL,
        $DSN = "",

        $OPT = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ];

    // Реализация соединения с БД
    protected function openConnection()
    {
        try
        {
            $user = Settings::getSetting("CurrentUser");

            $this->DBH = new \PDO($this->DSN,
                $user['user'],
                $user['pass'],
                $this->OPT);

            $this->DBH->query("SET NAMES ".Settings::getSetting("MySQLCharset"));
        }
        catch(\PDOException $e)
        {
            echo "Извините, но операция подключения к БД не может быть выполнена";
            echo $error = date("j.m.Y \a\\t G:i:s") . "\n\r\t".
                $e->getMessage() . "\n\r\n\r";
            file_put_contents('errors/DB.err', $error,FILE_APPEND);
        }
    }
}