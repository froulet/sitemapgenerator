<?php

namespace Froulet\Utils;

interface RequestInterface
{


    public function setGetParam($get, $value);
    public function getGetParam($key);
    public function getAllGetParams();
}
