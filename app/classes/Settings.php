<?php
namespace app\classes;


class Settings
{
    // DB-settings:
    private static $CurrentDB = "new_my_project", // name of DB
            $CurrentUser = array('user' => "php", 'password' => "12345"), // info of user (login & password)
            $DBHost = "localhost", // host, where DB is now
            $MySQLCharset = "utf8"; // encoding of MySQL

    // Document-settings:
    private static $encoding = "UTF-8", // document encoding
            $lang = "ru"; // document language

    // The history of changes settings
    public static $history = array();

    // DB-settings:
    private $DB, // name of DB
            $user, // info of user (login & password)
            $DB_host, // host, where DB is now
            $MySQL_charset, // encoding for MySQL
            $lng, // document language
            $charset; // document encoding

    //
    public function __construct(
        string $DB, string $user_name, string $DB_host, string $MySQL_charset,
        string $user_pass = "", string $encoding = "UTF-8",  string $lng = "ru"
    )
    {
        //
        $this->DB_host = $DB_host;
        $this->DB = $DB;
        $this->user = array('user' => $user_name, 'pass' => $user_pass);
        $this->MySQL_charset = $MySQL_charset;
        $this->lng = $lng;
        $this->charset = $encoding;
        //
        self::$history[] = $this;
        //
        $this->update();

        // Делаем так, чтобы объект не был у пользователя
        return null;
    }

    private function update()
    {
        //
        self::$DBHost = $this->DB_host;
        self::$CurrentDB = $this->DB;
        self::$CurrentUser = $this->user;
        self::$MySQLCharset = $this->MySQL_charset;
        self::$lang = $this->lng;
        self::$encoding = $this->charset;
        //
        Db::openNewConnection();
    }

    /**
     * Возвращение определённой настройки
     * @param $name string
     * @return string|array|null
     */
    public static function getSetting(string $name)
    {
        return (isset(self::$$name)) ? self::$$name : null;
    }
}