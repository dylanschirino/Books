
<h1> <?php echo $data['book'] -> title; ?></h1>
<?php if($data['book'] ->cover): ?>
<div class="cover">
    <img src="<?php echo $data['book']->cover; ?>" alt="">
</div>
<?php endif; ?>
<?php if($data['book']->isbn): ?>
    <div class="isbn">
        <?php echo $data['book']->isbn;?>
    </div>
<?php endif; ?>

<?php if($data['book']->summary): ?>
<div class="summary">
    <?php echo $data['book']->summary;?>
</div>
<?php endif; ?>
<?php if($data['book']->editor_id): ?>
    <div class="editor">
        <?php echo $data['book']->name;?>
    </div>
<?php endif; ?>
<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF'];?>">Retour vers tous les livres </a>
</div>
