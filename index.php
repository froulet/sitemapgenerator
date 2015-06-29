<?php
/**
/////////////// CONTROLLER ///////////////////////
//////////////////////////////////////////////////
 **/

session_start();
$html = '';

require_once 'Config/config.php';
//On charge l'autoload
require_once 'autoload.php';
spl_autoload_register('autoload');

//On définit les namespaces à utiliser
use Froulet\Articles\Article;
use Froulet\Articles\ArticleBD;
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
use Froulet\Images\ImageBD;
use Froulet\Uploads\UploadFactory;
use Froulet\FrontController\ArticleController;
use Froulet\Libraries\FrontController;
// use Froulet\Articles\TemplateRender as TemplateRender;
use Froulet\Libraries\Response;
use Froulet\Libraries\Request;
use Froulet\Utils\MainRequest;


//Définition des variables constantes
$css = "Ui/css/style.css";
$squelette = "Ui/index.html";
$date = date('Y-m-d');

if (isset($_GET["p"])) {
    $p = $_GET["p"];
} else {
    $p = 'home';
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_GET["order"])) {
    $order = $_GET["order"];
}


try {
    // créer objets Request et Response

    $request = new MainRequest($_GET, $_POST);


    $response = new Response();

    // lancer le FrontController
    $controller = new FrontController();

    //$controller->run($request, $response);
    $controller->run($request, $response);

    // récupérer les données à afficher
    // $titre = $response->getPart('title');
    // $contenu = $response->getPart('content');

    $html = $response->getPart('html');
} catch (\Exception $e) {
    //On catch les erreurs potentielles
    $html = "<div class='row'>
             <div class ='large-12 columns'>
              Une erreur s'est glissée dans cette page <br>";
    $html .= $e->getMessage();
    $html .= "{$e->getTraceAsString()}</div></div>";
}


require_once $squelette;
