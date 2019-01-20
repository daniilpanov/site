<?php
/** @var $page_get \app\classes\CPage */
$page_get = \app\classes\Factory::getInst("CPage");

$page = $page_get->getPage($_GET['page']);
?>

<header>
    <?php
    //require_once "views/VTopMenu.php";
    ?>
</header>

<main>
    <?=$page['content']?>
</main>