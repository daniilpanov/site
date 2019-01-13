<body class="container-fluid">
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