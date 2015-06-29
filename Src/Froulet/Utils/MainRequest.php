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

use Froulet\Libraries\Request;

class MainRequest extends Request
{
}
