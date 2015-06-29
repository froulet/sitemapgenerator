<?php

namespace Froulet\Libraries;

use Froulet\Articles\Article;

use Froulet\Articles\ArticleForm;
use Froulet\Articles\ArticleHTML;
use Froulet\Utils\Database\Database;
use Froulet\Utils\Auth\AuthManager;
use Froulet\Utils\Auth\AuthHTML;
use Froulet\Utils\RSS2\RSS2;
use Froulet\Utils\Atom\Atom;
use Froulet\Utils\Syndication\Syndication;
use Froulet\Utils\Display;
use Froulet\Utils\Nettoyeur;
use Froulet\Images\ImageForm;
use Froulet\Images\Image;

use Froulet\Uploads\UploadFactory;
use Froulet\FrontController\ArticleController;
use Froulet\FrontController\SiteMapController;
use Froulet\FrontController\ImageController;

class Router
{
    /**
    * @var array $parts le tableau des parties de HTML qui pourront être utilisées
    */
    protected $controllerClass;
    protected $action;
    protected $arg;

    public function __construct($data)
    {
        // reprendre ici le code de index.php
        // pour choisir la classe de contrôleur à créer
        // et mettre son nom dans $this->controllerClass
        // ... à faire ...

        //echo 'Routeur ok';


        $id = $data->getGetParam('id');
        $data = $data->getGetParam('p');

        $this->arg = $id;


        switch ($data) {



            case 'localevents':
                $this->controllerClass = "Froulet\Libraries\FrontController\ArticleController";
                $this->action = $data;
                break;


        //////////////DEFAULT/////////////

                default:
                $this->controllerClass = "Froulet\Libraries\FrontController\SiteMapController";
                $this->action = 'home';
                break;



        }
    }


    public function getControllerClassName()
    {
        return $this->controllerClass;
    }



    public function getControllerAction()
    {
        return $this->action;
    }
}
