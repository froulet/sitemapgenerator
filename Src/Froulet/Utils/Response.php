<?php
/**
* embryon de classe gérant la réponse du serveur.
* Il faudrait lui ajouter la gestion des en-têtes HTTP comme dans le tuto de sitepoint.com
* Et aussi on pourrait lui ajouter la gestion du squelette HTML et de son "remplissage".
*/
namespace Froulet\Utils;

class Response
{
    /**
    * @var array $parts le tableau des parties de HTML qui pourront être utilisées
    */
    protected $parts;

    public function __construct($parts = array())
    {
        $this->parts = $parts;
    }

    /**
    * ajouter une partie
    */
    public function setPart($key, $content)
    {
        $this->parts[$key] = $content;
    }

    public function getPart($key)
    {
        if (isset($this->parts[$key])) {
            return $this->parts[$key];
        } else {
            throw new \Exception("Partie {$key} non existante");
        }
    }
}
