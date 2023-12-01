<?php

namespace Core;

class ConfigController{
    private string $url;

    private array $urlArray;

    private string $urlController;

    private string $urlMetodo;



    public function __construct()
    {
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {

            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            //var_dump($this->url); 
            $this->urlArray = explode("/", $this->url);
            //var_dump($this->urlArray);

            if ((isset($this->urlArray[0])) and (isset($this->urlArray[1]))) {

                $this->urlController = $this->urlArray[0];

                $this->urlMetodo = $this->urlArray[1];

            } else {
                $this->urlController = "erro";
                }
                $this->urlMetodo = "index";

        } else {
            $this->urlController = "home";
        }
        $this->urlMetodo = "index";

        echo "Controller: {$this->urlController}<br>";
        echo "Método: {$this->urlMetodo} <br>";
    }

    //Método para carregar uma página (Controller)

    public function loadPage(){
        $urlController = ucwords($this->urlController); //converte a primeira letra para maiúscula
        echo "Carregar a pagina/Controller <br>";

        $classLoad = "\\Sts\Controllers\\$urlController";

        echo $classLoad . "<br>";

        $classPage = new $classLoad();
        $classPage->index();
    }
}

