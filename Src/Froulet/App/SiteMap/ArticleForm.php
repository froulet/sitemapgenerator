<?php

namespace Froulet\App\Articles;

use Froulet\Libraries\Document\DocumentForm as DocForm;

class ArticleForm extends DocForm
{




    /**
     * [initialize description]
     * @param  array  $raw [description]
     * @return [type]      [description]
     */
    public static function initialize($raw = array())
    {
        $data = array();
        if (isset($raw['id']) && (trim($raw['id']) != '')) {
            $data['id'] = (int) $raw['id'];
        } else {
            $data['id'] = null;
        }
        $data['titre'] = isset($raw['titre']) && (trim($raw['titre']));
        $data['chapo'] = isset($raw['chapo']) && (trim($raw['chapo']));
        $data['contenu'] = isset($raw['contenu']) && (trim($raw['contenu']));
        $data['autor'] = isset($raw['autor']) && (trim($raw['autor']));
        $data['status'] = isset($raw['status']) && (trim($raw['status']));

        // Idem pour la suite du formulaire!
        return new self($data);
    }



    /**
     * [CreateInputArea description]
     * @param [type] $name   [description]
     * @param [type] $value  [description]
     * @param [type] $erreur [description]
     */
    public function createInputArea($name, $value, $erreur)
    {
        $label = ucfirst($name);
        $el = "$label <br>";
        $el .= "<span class='error'>$erreur</span>";
        $el .= "<textarea rows='3' name='$name' id='$name'>$value</textarea> <br>";
        $this->addElement($el);
    }


    /**
     * [CreateForm description]
     * @param [type] $action [description]
     * @param [type] $method [description]
     */
    public function createForm($action, $method)
    {
        //Création du formulaire en incluant le Ckeditor pour le contenu.
        $return = '';
        $return = "<form action='$action' method='$method' enctype='multipart/form-data'>
                <script src='Ui/scripts/ckeditor/ckeditor.js'></script>";

        foreach ($this->listElement as $element) {
            $return .= $element;
        }
        $return .= "<input type='submit' value='Enregistrer'> </form>
             <script>
                CKEDITOR.replace( 'contenu', {
    language: 'fr',
    enterMode : CKEDITOR.ENTER_BR

});
            </script>";

        return $return;
    }



    public function createFormNewArticle($action, $method, $erreurs)
    {

        //Création du formulaire en incluant le Ckeditor pour le contenu.
        $return = '';
        $return = "
        <div class='row'>
        <div class='large-10 columns'>
        <h1>&#201;crire un nouvel article</h1><br>
        <form action='$action' method='$method' enctype='multipart/form-data'>
                <script src='Ui/scripts/ckeditor/ckeditor.js'></script>";

        $html = $this->CreateInputText('titre', '', $erreurs['vide']);
        $html .= $this->CreateInputArea('chapo', '', $erreurs['vide']);
        $html .= $this->CreateInputText('autor', '', $erreurs['vide']);
        $html .= $this->CreateInputArea('contenu', '', $erreurs['vide']);

        foreach ($this->listElement as $element) {
            $return .= $element;
        }
        $templater = new ArticleHTML('');
        $return .= $templater->render('template4', 'test=>test');

        $return .= "
        <input type='submit' value='Enregistrer'> </form>
        <script>
        CKEDITOR.replace( 'contenu', {
        language: 'fr',
        enterMode : CKEDITOR.ENTER_BR
        });
        </script>
            </div>
            </div>";

        return $return;
    }


    public function createFormModifierArticle($action, $method, $result, $erreurs)
    {

        //Création du formulaire en incluant le Ckeditor pour le contenu.

        $return = '';
        $return = "
        <div class='row'>
        <div class='large-10 columns'>
        <h1>Modifier l'article</h1><br>
        <form action='$action' method='$method' enctype='multipart/form-data'>
                <script src='Ui/scripts/ckeditor/ckeditor.js'></script>";


        $html = $this->CreateInputText('titre', $result->getTitre(), $erreurs['titre']);
        $html .= $this->CreateInputArea('chapo', $result->getChapo(), $erreurs['chapo']);
        $html .= $this->CreateInputText('autor', $result->getAutor(), $erreurs['autor']);
        $html .= $this->CreateInputArea('contenu', $result->getContenu(), $erreurs['contenu']);
        $html .= $this->CreateHiddenInput('id', $result->getId());

        foreach ($this->listElement as $element) {
            $return .= $element;
        }
        $templater = new ArticleHTML('');
        $return .= $templater->render('template4', 'test=>test');

        $return .= "
        <input type='submit' value='Enregistrer'> </form>
        <script>
        CKEDITOR.replace( 'contenu', {
        language: 'fr',
        enterMode : CKEDITOR.ENTER_BR
        });
        </script>
            </div>
            </div>";

        return $return;
    }

    public function createFormSearch($action, $method, $erreurs)
    {
        $return = '';

        $html = $this->CreateInputText('city', '', $erreurs['vide']);
        
        $return = "<form action='$action' method='$method' enctype='multipart/form-data'>";

        foreach ($this->listElement as $element) {
            $return .= $element;
        }
        $return .= "<input type='submit' value='Enregistrer'> </form>";
        return $return;
    }
}
