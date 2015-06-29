<?php

namespace Froulet\Libraries\Document;

use Froulet\Utils\Templater\Templater;

abstract class DocumentHTML extends Templater implements DocumentHTMLInterface
{

        public function getDocumentClass()
        {
            return static::NSNAME . "\\" . static::CLASSNAME;
        }
}
