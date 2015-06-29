<?php

/**
 * [autoload description]
 * @param  [type] $className [description]
 * @return [type]            [description]
 */
function autoload($className)
{
    $namespaces = explode('\\', $className);
    $render = array_shift($namespaces);
    $path = implode("/", $namespaces);
    $fullpath = 'Src/' . VENDOR . '/' . $path . '.php';
    //echo "<br>".$fullpath;
    include $fullpath;
}
