<?php

namespace Froulet\Utils;

class Display
{

    /**
     * [nettoyer description]
     * @param  [Tableau] $tableau [Tableau de string]
     * @return [array]          [Tableau de string nettoyées]
     */
    public static function nettoyer($tableau)
    {
        $data = array();

        foreach ($tableau as $key => $value) {
            $data[$key] = htmlspecialchars($value);
            $data[$key] = nl2br($value);
            $data[$key] = html_entity_decode($value);
        }

        return $data;
    }

        /**
         * [RemoveSpecialChars description]
         * @param [array] $tableau [Tableau de strings nettoyées]
         */
    public static function removeSpecialChars($tableau)
    {
        $data = array();

        foreach ($tableau as $key => $value) {
            //Check is value is an array or not
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * [Nl2Br description]
     * @param [array] $tableau [description]
     */
    public static function nl2Br($tableau)
    {
        $data = array();
        echo 'Nl2Br';
        foreach ($tableau as $key => $value) {
            $data[$key] = nl2br($value);
        }

        return $data;
    }
}
