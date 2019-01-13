<?php
// Включаем возможность пользоваться $_SESSION
session_start();

// Автозагрузка классов
spl_autoload_register (
    function ($namespace)
    {
        $path = str_replace("\\", "/", $namespace);

        require_once "{$path}.php";
    }
);

//
if (!file_exists("errors"))
{
    header("Location: install.php");
}