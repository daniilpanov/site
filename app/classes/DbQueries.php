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
            $user = DbSettings::getSetting("CurrentUser");

            $this->DBH = new \PDO($this->DSN,
                $user['user'],
                $user['password'],
                $this->OPT);

            $this->DBH->query("SET NAMES ".DbSettings::getSetting("MySQLCharset"));
        }
        catch(\PDOException $e)
        {
            echo "Извините, но операция подключения к БД не может быть выполнена";

            Functions::writeError(date("j.m.Y \a\\t G:i:s"), $e->getMessage(), "DB");
        }
    }

    /**
     * @param string $query
     * @param array $params
     * @param bool $emulate
     * @return \PDOStatement|null
     * @throws \PDOException
     */
    protected function query(string $query, array $params, bool $emulate)
    {
        //
        $STH = null;

        // если вместе с запросом был передан массив с данными
        if ($params !== NULL)
        {
            $STH = $this->DBH->prepare($query);

            $this->DBH->setAttribute(\PDO::ATTR_EMULATE_PREPARES, $emulate);
            $STH->execute($params);
        }
        else
        {
            $STH = $this->DBH->query($query);
        }


        return $STH;
    }
}