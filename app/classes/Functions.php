<?php
namespace app\classes;


class Functions
{
    public static function writeError($date, $message, $file)
    {
        $filename = "errors/{$file}.err";

        $error = "\n\r\n\r" . $date . "\n\r\t". $message;

        $content = file_get_contents($filename);

        file_put_contents($filename, $error.$content);
    }
}