<?php

class Bootstrap
{
    private $url = null;
    private $controller = null;

    private $controllerPath = 'controllers/';
    private $errorFile = 'err.php';
    private $defaultFile = 'home.php';

    /**
     * preiau url-ul din browser
     * daca url-ul este gol, import un controller by default, adica redirectionez catre controller-ul home
     * altfel, preiau controller ul corect si apelez metoda pentru controller
     */
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

    /** setters **/
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

    /**
     * import controller-ul home si apelez metoda index() din acesta
     */
    private function loadDefaultController()
    {
        require $this->controllerPath . $this->defaultFile;
        $this->controller = new Home();
        $this->controller->index();
    }

    /**
     * preiau numele controller-ului din url
     * daca exista, il import
     * si il instantiez
     */
    private function loadExistingController()
    {
        $file = $this->controllerPath . $this->url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->controller = new $this->url[0];
        } else {
            $this->error();
        }
    }

    /**
     * in functie de numarul de parametrii aflati in url exista mai multe cazuri
     * aici am considerat doar 5
     * daca exista un singur parametru, adica numele controller-ului, se va apela functia index din acesta
     * daca exista 2 parametrii, se va apela functia cu numele celui de-al doilea parametru din url din controller-ul curent
     * daca exista 3 parametrii, se va apela functia cu 1 parametru din url in controller-ul curent
     * cazurile 4 si 5 variaza doar prin nr-ul de parametrii al functiilor ce vor fi apelate
     */
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

    /**
     * daca numele controller ului din url nu este gasit, se va apela functia index din clasa Err
     */
    private function error()
    {
        require $this->controllerPath . $this->errorFile;
        $this->controller = new Err();
        $this->controller->index();
        exit;
    }
}
