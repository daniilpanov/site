<?php
namespace app\classes;


class MPage
{
    protected function getPage($id)
    {
        $page = Db::getInstance()->read("pages", "*", array("id" => $id));

        return $page;
    }
}