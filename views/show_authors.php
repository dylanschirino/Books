
<h1> <?php echo $data['author'] -> name; ?></h1>
<?php if($data['author'] ->photo): ?>
<div class="cover">
    <img src="<?php echo $data['author']->photo; ?>" alt="">
</div>
<?php endif; ?>
<?php if($data['author']->birth_date): ?>
<div class="birthdate">
    <?php echo 'Né(e)  : '.$data['author']->birth_date;?>
</div>
<?php endif; ?>
<?php if($data['author']->death_date): ?>
    <div class="">
        <?php echo 'Mort le  : '.$data['author']->death_date;?>
    </div>
<?php endif; ?>
<?php if($data['author']->bio): ?>
    <div class="bio">
        <?php echo 'Description : '.$data['author']->bio;?>
    </div>
<?php endif; ?>

<?php if($data['books']): ?>
    <h2>Livres&nbsp;:</h2>
    <ul class="livre">
        <?php foreach($data['books'] as $book) : ?>
            <li class="author">
                <a href="?a=show&e=books&id=<?php echo $book->id;?>"><?php echo $book->title;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if($data['editors']): ?>
    <h2>Editeur&nbsp;:</h2>
    <ul class="editeur">
        <?php foreach($data['editors'] as $editor) : ?>
            <li class="author">
                <a href="?a=show&e=editors&id=<?php echo $editor->id;?>&with=authors,books"><?php echo $editor->names;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

