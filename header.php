<?php
/**
 * Получаем объект Router'а
 * @var $router \app\classes\Router
 */
$router = \app\classes\Router::getInstance();

// Кодировка всего документа
$encoding = \app\classes\Settings::getSetting("encoding");
?>

<!DOCTYPE html>
<html lang="<?=$encoding?>" xml:lang="<?=$encoding?>">
<head>
    <!-- Мета-теги для корректного отображения страницы браузерами -->
    <meta charset="<?=$encoding?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="<?=$router->getKeywords()?>">
    <meta name="Description" content="<?=$router->getDescription()?>">
    <meta name="Robots" content="">
    <meta name="Ratings" content="">
    <meta name="Author" content="">

    <!-- Заголовок вкладки -->
    <title>
        <?=$router->getTitle()?>
    </title>
    <!-- Иконка вкладки -->
    <link rel="icon" href="img/favicon.png">

    <!-- My styles & JS -->
    <link rel="stylesheet" href="styles/Styles.css">
    <link rel="stylesheet" href="styles/MediaStyles.css">
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/classes.js" type="text/javascript"></script>

    <!-- BOOTSTRAP 4.0.0 -->
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>