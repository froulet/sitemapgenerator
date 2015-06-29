<?php
namespace Froulet\Libraries;

use Froulet\Document\Document as Doc;
use Froulet\Libraries\Router;
// use Froulet\Articles\Article;
// use Froulet\Articles\ArticleBD;
// use Froulet\Articles\ArticleForm;
// use Froulet\Articles\ArticleHTML;
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
use Froulet\Images\ImageBD;
use Froulet\Uploads\UploadFactory;
use Froulet\Libraries\FrontController\ArticleController;
use Froulet\Libraries\FrontController\SiteMapController;
use Froulet\Libraries\FrontController\ImageController;
use Froulet\Libraries\FrontController\AuthController;

class FrontController implements FrontControllerInterface
{

    protected $controllerClass;
    protected $action;
    protected $routeur;

    /**
    * constructeur de la classe.
    *
    *
    * @param array $data le tableau des données reçues par index.php
    */
    public function __construct()
    {
    }

    

    /**
    * méthode pour lancer le routeur et exécuter l'action à faire
    * Prend en paramètre les objets request et response.
    */
    public function run($request, $response)
    {
        $this->routeur = new Router($request);
        $classname = $this->routeur->GetControllerClassName();
        $action = $this->routeur->getControllerAction();

        $class = new $classname($request, $response);

        return $class->$action();
    }
}
