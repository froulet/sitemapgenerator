<?php

namespace Froulet\Libraries\Document;

abstract class DocumentForm implements DocumentFormInterface
{


    public $listElement = array(); // tableaux d'éléments
                                   /// GET ou POST
    private $typemethode = '';
    /// script déclenché par la soumission
    private $action = '';
    /// tableau d'échange avec le HTML
    private $methode = array();
    /// lien si on veut forcer un téléchar gement
    private $download = '';
    
    /**
     * [CreateDisplayImage description]
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public function createDisplayImage($name, $value)
    {
        $label = ucfirst($name);
        $el = "$label <br>";
        $el .= "<img src='$value' />";
        $this->addElement($el);
    }

        /**
     * [CreateHiddenInput description]
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public function createHiddenInput($name, $value)
    {
        $el = "<input type='hidden' name='$name' value='$value' />";
        $this->addElement($el);
    }

        /**
     * [addElement description]
     * @param [type] $element [description]
     */
    public function addElement($element)
    {
        $this->listElement[] = $element;
    }



    /**
     * [formulaire description]
     * @return [type] [description]
     */
    public function formulaire()
    {
        $html = "
        <form action='{$action}'' method='POST'>
        Nom : <input type='text' name='productName' value='$this->article->setProductName()''
        </form>
        EOT;";
    }
    
        /**
     * [CreateInputImage description]
     * @param [type] $name   [description]
     * @param [type] $erreur [description]
     */
    public function createInputImage($name, $erreur)
    {
        $label = ucfirst($name);
        $el = "$label <br>";
        $el .= "<span class='error'>$erreur</span>";
        $el .= "<input type='file' name='fileToUpload' id='fileToUpload'>";
        $this->addElement($el);
    }

        /**
     * [CreateInputText description]
     * @param [type] $name   [description]
     * @param [type] $value  [description]
     * @param [type] $erreur [description]
     */
    public function createInputText($name, $value, $erreur)
    {
        $label = ucfirst($name);
        $el = "$label <br>";
        $el .= "<span class='error'>$erreur</span>";
        $el .= "<input type='text' name='$name' value='$value'/><br>";
        $this->addElement($el);
    }
}
