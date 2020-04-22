<?php

class Router
{
    private $url = null;
    private $controller = null;

    private $controllerPath = 'controllers/';
    private $modelPath = 'models/';
    private $errorFile = 'error.php';
    private $defaultFile = 'home.php';


    public function init()
    {
        $this->getUrl();
        if (empty($this->url[0])) {
            $this->loadDefaultController();
            return false;
        }
        $this->loadExistingController();
        $this->callControllerMethod();
    }

    public function setControllerPath($path)
    {
        $this->controllerPath = trim($path, '/') . '/';
    }


    public function setModelPath($path)
    {
        $this->modelPath = trim($path, '/') . '/';
    }


    public function setErrorFile($path)
    {
        $this->errorFile = trim($path, '/');
    }

    public function setDefaultFile($path)
    {
        $this->defaultFile = trim($path, '/');
    }

    private function getUrl()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->url = str_replace('-', '', $this->url);
        $this->url = filter_var($this->url, FILTER_SANITIZE_URL);
        $this->url = rtrim($this->url, '/');
        $this->url = explode('/', $this->url);
    }


    private function loadDefaultController()
    {
        require $this->controllerPath . $this->defaultFile;
        $this->controller = new Home();
        $this->controller->index();
    }


    private function loadExistingController()
    {
        $file = $this->controllerPath . $this->url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->controller = new $this->url[0];
            //  $this->controller->loadModel($this->url[0]);
        } else {
            $this->error();
        }
    }


    private function callControllerMethod()
    {
        $length = count($this->url);

        if ($length > 1) {
            if (!method_exists($this->controller, $this->url[1])) {
                $this->error();
            }
        }

        switch ($length) {
            case 5:

                $this->controller->{$this->url[1]}($this->url[2], $this->url[3], $this->url[4]);
                break;

            case 4:

                $this->controller->{$this->url[1]}($this->url[2], $this->url[3]);
                break;

            case 3:
                $this->controller->{$this->url[1]}($this->url[2]);
                break;

            case 2:
                $this->controller->{$this->url[1]}();
                break;

            default:
                $this->controller->index();
                break;
        }
    }

    private function error()
    {
        require $this->controllerPath . $this->errorFile;
        $this->controller = new Err();
        $this->controller->index();
        exit;
    }
}
