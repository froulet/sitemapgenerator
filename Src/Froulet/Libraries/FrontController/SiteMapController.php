<?php
// LE CHEMIN DU NAMESPACE (ICI DOSSIER !!)
namespace Froulet\Libraries\FrontController;

use Froulet\App\SiteMap\SiteMap;
use Froulet\App\Articles\TemplateRender;
use Froulet\App\Articles\Events;

use Froulet\App\Articles\ArticleForm;
use Froulet\App\Articles\ArticleHTML;
use Froulet\Utils\Display;
use Froulet\App\Images\Image;

use Froulet\Utils\Nettoyeur;
use Froulet\Libraries\Document\DocumentControllerInterface as Doc;
use Froulet\Utils\Auth\AuthManager;
use Froulet\Utils\PermissionsManager;
use Froulet\Templater\Templater;

class SiteMapController implements Doc
{

    protected $request;
    protected $response;

     
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
 
     

    public function home()
    {

        $sitemap = SiteMap::initialize();
        SiteMap::CreateXMLFile($sitemap);
        $generated = "<h2>Site Map Generated ! Download it <a href='sitemap.xml'>here</a></h2>".$sitemap;
        $this->response->setPart('html', $generated);


    }


}
