<?php
namespace app\classes;


class CSettings extends MSettings
{
    public function getSettings($name, $cols, $type = null)
    {
        $settings = parent::getSettings($name, $cols);

        $result = $settings->fetch();

        if ($type == "array")
        {
            $tmp_res = array();

            foreach ($result as $index => $item)
            {
                $tmp_res[$index] = explode(", ", $item);
            }

            $result = $tmp_res;
        }
        elseif ($type == "list")
        {
            $tmp_res = array();

            foreach ($result as $index => $item)
            {
                $tmp_res[$index] = explode(", ", $item);

                $tmp_res2 = array();

                foreach ($tmp_res[$index] as $values)
                {
                    list($key, $value) = explode("=>", $values);
                    $tmp_res2[$key] = $value;
                }

                $tmp_res = $tmp_res2;
            }

            $result = $tmp_res;
        }

        return $result;
    }
}