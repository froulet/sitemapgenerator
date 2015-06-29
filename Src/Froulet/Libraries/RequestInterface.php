<?php

namespace Froulet\Libraries;

interface RequestInterface
{


    public function setGetParam($get, $value);
    public function getGetParam($key);
    public function getAllGetParams();
}
