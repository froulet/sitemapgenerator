    <script type="text/javascript" src="/App/Ui/scripts/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/App/Ui/css/slick/slick.css" property='stylesheet'/>
    <link rel="stylesheet" type="text/css" href="/App/Ui/css/slick/slick-theme.css" property='stylesheet'/>
    <script type="text/javascript" src="/App/Ui/scripts/slick/slick.min.js"></script>

<div class="row">
 <div class="large-10 columns">
    <?php echo $var; ?>
    <div>
    <h3><?php echo nl2br($this->article->getTitre()); ?></h3>
    <div class=""><h4 class="subheader">Chapo</h4>  <?php echo nl2br($this->article->getChapo()); ?></div>
    <div class=""><h4 class="subheader">Contenu</h4>  <?php echo nl2br($this->article->getContenu()); ?></div>
    <div class="Line"><h4 class="subheader">Auteur</h4>  <?php echo nl2br($this->article->getAutor()); ?></div>
    <div class="Line"><h4 class="subheader">Date Publication</h4>  <?php echo nl2br($this->article->getDatepublication()); ?></div>
    <div class="Line"><h4 class="subheader">Date Création</h4>  <?php echo nl2br($this->article->getDatecreation()); ?></div>

     </div>
            <br>
    <a href="/App/modifier/<?php echo $this->article->getId(); ?>">Modifier</a><br>
    <a href="/App/supprimer/<?php echo $this->article->getId(); ?>">Supprimer</a><br>
    <a href="/App/addimage/<?php echo $this->article->getId(); ?>">Ajouter une image ou un PDF</a>
</div>
    </div>

<script>
         $(document).ready(function(){
          $('#demimages').slick({

             dots: true,
             infinite: true,
             speed: 300,
             slidesToShow: 1,
             adaptiveHeight: true

          });
        });
    
</script>
