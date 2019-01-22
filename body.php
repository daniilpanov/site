<body class="container-fluid">
<button id="back" onclick="window.history.back()">Назад</button>
<?php
try
{
    \app\classes\Router::getInstance()->includeView();
}
catch (\Exception $e)
{
    echo $e->getMessage();
}
?>