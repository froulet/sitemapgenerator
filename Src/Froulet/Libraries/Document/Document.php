<?php
namespace Froulet\Libraries\Document;

abstract class Document implements \Froulet\Libraries\Document\DocumentInterface
{

    public function instancier($row)
    {
            $product = new Article(
                $row['id'],
                $row['titre'],
                $row['chapo'],
                $row['contenu'],
                $row['autor'],
                $row['status'],
                $row['datecreation'],
                $row['datepublication'],
                $row['img']
            );
            return $product;
    }
}
