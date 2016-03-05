
<h1> <?php echo $data['author'] -> name; ?></h1>
<?php if($data['author'] ->photo): ?>
<div class="cover">
    <img src="<?php echo $data['author']->photo; ?>" alt="">
</div>
<?php endif; ?>
<?php if($data['author']->birth_date): ?>
<div class="summary">
    <?php echo $data['author']->birth_date;?>
</div>
<?php endif; ?>
<?php if($data['author']->death_date): ?>
    <div class="summary">
        <?php echo $data['author']->death_date;?>
    </div>
<?php endif; ?>
<?php if($data['author']->nationality_id): ?>
    <div class="nationality">
        <?php echo $data['author']->nationality_id;?>
    </div>
<?php endif; ?>
<?php if($data['author']->bio): ?>
    <div class="bio">
        <?php echo $data['author']->bio;?>
    </div>
<?php endif; ?>
<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF'];?>">Retour vers tous les livres </a>
</div>
