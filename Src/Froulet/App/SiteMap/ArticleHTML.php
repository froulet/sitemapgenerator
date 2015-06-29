<?php

namespace Froulet\App\Articles;

use Froulet\Articles;
use Froulet\Libraries\Document\DocumentHTML as DocHTML;

class ArticleHTML extends DocHTML
{

    const NSNAME = __NAMESPACE__;
    const CLASSNAME = 'Article';
    
    protected $article;

    /**
     * [__construct description]
     * @param [type] $article [description]
     */
    public function __construct($article)
    {
        $this->article = $article;
    }

    /**
     * [getarticle description]
     * @return [type] [description]
     */
    public function getarticle()
    {
        return $this->article;
    }
}
