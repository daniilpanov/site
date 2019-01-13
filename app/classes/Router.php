<?php
namespace app\classes;

class Router implements Controller
{
    // Используем Singleton
    use Singleton;

    private
        $including, // "Views", которые надо подключать
        $title, // заголовок вкладки
        $keywords, // Ключевые слова
        $description, // описание
        $page_id; // ID страницы

    private function __construct()
    {
        $this->including = "StartPage";
        //$this->title = Db::getInstance()->;

        try
        {
            if ($_GET)
            {
                $this->router($_GET, "GET");
            }

            if ($_POST)
            {
                $this->router($_GET, "POST");
            }

            if ($_FILES)
            {
                $this->router($_GET, "FILES");
            }
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * @param $req
     * @param $type
     * @throws \Exception
     */
    private function router($req, $type)
    {
        switch ($type)
        {
            case "GET":
                $this->GET($req);
                break;
            case "POST":

                break;
            case "FILES":

                break;
            default:
                throw new \Exception("This type of superglobal arrays is not append!");
                break;
        }
    }

    private function GET($get)
    {
        foreach ($get as $key => $id)
        {
            switch ($key)
            {
                case "page":
                    if ($id == "home")
                    {
                        $this->including = "MainPage";
                        $this->page_id = null;
                    }
                    else
                    {
                        $this->including = "Page";
                        $this->page_id = $id;
                    }
                    break;
            }
        }

    }

    /**
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return mixed
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * Подключение текущих видов
     * @return void
     */
    public function includeView()
    {
        try
        {
            $path = "views/V{$this->including}.php";
            if (!file_exists($path))
            {
                throw new Exception("<b>Error: </b>View not found!");
            }
            else
            {
                require_once "{$path}";
            }
        }
        catch (\Exception $e)
        {

        }
    }

}