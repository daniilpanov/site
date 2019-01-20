<?php
namespace app\classes;


class CPage extends MPage
{
    public function getPage($id)
    {
        $page = parent::getPage($id);

        return $page->fetch();
    }
}