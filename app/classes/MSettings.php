<?php
namespace app\classes;


class MSettings
{
    protected function getSettings($name, $cols)
    {
        $res = Db::getInstance()->read("constants", $cols, array("name" => $name));
        return $res;
    }
}