<?php
/**
 * @var $settings \app\classes\CSettings
 * Объект для того, чтобы получать настройки с БД
 * и записывать их в константы
 */
$settings = \app\classes\Factory::getInst("CSettings");

// КОНСТАНТЫ:
define("LANGUAGES", $settings->getSettings("lng", "value", "array"), true); // константа-массив со всеми языками