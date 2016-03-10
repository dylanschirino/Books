<!--
/**
 * File: show_editors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:20
 */
 -->
<h1> <?php echo $data['editor'] -> names; ?></h1>
<?php if($data['editor'] ->logo): ?>
    <div class="logo">
        <img src="<?php echo $data['editor']->logo; ?>" alt="">
    </div>
<?php endif; ?>
<?php if($data['editor']->url): ?>
    <div class="url">
        <?php echo 'Site Web : '.$data['editor']->url;?>
    </div>
<?php endif; ?>
<?php if($data['editor']->summary): ?>
    <div class="summary">
        <?php echo 'Résumé : '.$data['editor']->summary;?>
    </div>
<?php endif; ?>
<?php if($data['editor']->nationality_id): ?>
    <div class="nationality">
        <?php echo 'Nationalité : '.$data['editor']->nationality;?>
    </div>
<?php endif; ?>
<?php if($data['editor']->date_of_creation): ?>
    <div class="creation">
        <?php echo 'Date de création : '.$data['editor']->date_of_creation;?>
    </div>
<?php endif; ?>
<?php if($data['editor']->date_of_closing): ?>
    <div class="creation">
        <?php echo 'Date de fermeture : '.$data['editor']->date_of_closing;?>
    </div>
<?php endif; ?>
<?php if($data['editor']->title): ?>
    <div class="livre">
        <?php echo'Livre : '.$data['editor']->title;?>
    </div>
<?php endif; ?>
<div class="alleditors">
    <a href="<?php echo $_SERVER['PHP_SELF'];?>">Retour vers la page des Editeurs </a>
</div>