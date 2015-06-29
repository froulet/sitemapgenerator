<?php
/**
* embryon de classe Request.
*
* La classe ne gère et n'encapsule ici que les données GET.
* Il faudrait l'améliorer pour encapsuler les données POST et FILES par exemple.
*
* La classe ne gère pas non plus le cas où un .htaccess est utilisé pour faire
* la réécriture d'URL.
*/
namespace Froulet\Utils;

abstract class Request implements RequestInterface
{

    // données GET
    protected $get;
    //Données POST
    protected $post;

    public function __construct($get, $post)
    {
        $this->params = $get;
        $this->paramspost = $post;
    }

    public function setGetParam($key, $value)
    {
        $this->get[$key] = $value;
        return $this;
    }

    public function setPostParam($key, $value)
    {
        $this->post[$key] = $value;
        return $this;
    }

    public function getGetParam($key)
    {
        if (!isset($this->params[$key])) {
            //throw new \Exception("Paramètre '{$key}' non existant");
            return false;
        }
        return $this->params[$key];
    }


    public function getPostParam($key)
    {
        if (!isset($this->paramspost[$key])) {
            //throw new \Exception("Paramètre '{$key}' non existant");
            return false;
        }
        return $this->paramspost[$key];
    }

    public function getAllGetParams()
    {
        return $this->get;
    }

    public function getAllPostParams()
    {
        return $this->post;
    }
}
