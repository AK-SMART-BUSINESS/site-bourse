<?php
namespace Libs\panel;


use App\Main;
use App\Session;

class Application
{
    private $url = "";
    private $action = "";
    private $file = "";
    private $url_params = [];
    /**
     * Initialise l'application
     */
    public function __construct()
    {
        if (!Session::sessionExist()) {
          header("location: ".URL."login.php");
          exit();
        }
        if (isset($_GET['url'])){
            $this->url = $_GET['url'];
        }

        $this->configuration();
    }
    /**
     * Configure les actions (Les pages à ajoutées) et les paramètres
     */
    private function configuration(){
        if ($this->url == "") {
            $this->action = "dash";
        }else {
            $url = trim($this->url,'/');
            $url = explode('/', $url);
            $this->action = $url[0];
            unset($url[0]);
            $this->url_params = !empty($url) ? $url : [];
            unset($url);
        }
        //var_dump($this->action);
    }

    private function setPageFile()
    {
        $this->file = $this->page.'.phtml';
    }
    /**
     * Lance l'application
     */
    public function run()
    {
        try {
            if (method_exists("App\Main", $this->action)) {
                $action = $this->action;
                $app = new Main($this->action, $this->url_params);
                $app->$action();
            } else {
                throw new \Exception("Erreur ! Action non valide.", 1);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

}