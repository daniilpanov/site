<?php
/** @var $page_get \app\classes\CPage */
$page_get = \app\classes\Factory::getInst("CPage");

var_dump($page = $page_get->getPage($_GET['page']));
?>

<header>
    <?php
    if ($page['menus_vis'] == "top" || $page['menus_vis'] == "all")
    {
        require_once "views/VTopMenu.php";
    }
    ?>
</header>

<main>
    <?=$page['content']?>
</main>