<?php

namespace Froulet\App\Articles;

use Froulet\Utils\Database\Database;
use Froulet\Libraries\Document\DocumentBD as DocBDay;

class ArticleBD extends DocBDay
{


    const NSNAME = __NAMESPACE__;
    const CLASSNAME = 'Article';
    /**
     * [__construct description]
     */
    public function __construct()
    {
    }

    public static function getTable()
    {
        return 'articles';
    }

    public static function getValues()
    {
        return ':titre,:chapo,:contenu,:autor,:status,:datecreation,:datepublication, :img';
    }

    public static function getUpdateValues()
    {
        return 'titre = :titre, chapo=:chapo, contenu=:contenu, autor=:autor, status=:status,
        datecreation=:datecreation, datepublication=:datepublication, img=:img';
    }


    public static function getBinds($article)
    {
        $id = htmlspecialchars($article->getId());
        $titre = htmlspecialchars($article->getTitre());
        $chapo = htmlspecialchars($article->getChapo());
        $contenu = htmlspecialchars($article->getContenu());
        $autor = htmlspecialchars($article->getAutor());
        $status = htmlspecialchars($article->getStatus());
        $datecreation = htmlspecialchars($article->getDatecreation());
        $datepublication = date("Y-m-d");


        return (array(':titre' => $titre, ':chapo' => $chapo, ':contenu' => $contenu,
            ':autor'=> $autor, ':status' => $status, ':datecreation' => $datecreation, ':datepublication' => $datepublication,
            ':img' => ''));
    }
}
