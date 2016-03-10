
<h1> <?php echo $data['book'] -> title; ?></h1>
<?php if($data['book'] ->cover): ?>
<div class="cover">
    <img src="<?php echo $data['book']->cover; ?>" alt="">
</div>
<?php endif; ?>
<?php if($data['book']->isbn): ?>
    <div class="isbn">
        <?php echo'ISBN : '.$data['book']->isbn;?>
    </div>
<?php endif; ?>
<?php if($data['book']->summary): ?>
<div class="summary">
    <?php echo 'Résumer : '.$data['book']->summary;?>
</div>
<?php endif; ?>
<?php if($data['book']->names): ?>
    <div class="editor">
        <?php echo'Editeur: '. $data['book']->names;?>
    </div>
<?php endif; ?>
<?php if($data['book']->name): ?>
    <div class="auteur">
        <?php echo'Auteur : '.$data['book']->name;?>
    </div>
<?php endif; ?>
<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF'];?>">Retour vers tous les livres </a>
</div>
