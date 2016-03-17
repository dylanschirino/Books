
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
<?php if($data['authors']): ?>
    <h2>Auteur&nbsp;:</h2>
    <ul class="auteur">
        <?php foreach($data['authors'] as $author) : ?>
        <li class="author">
            <a href="?a=show&e=authors&id=<?php echo $author->id;?>&with=editors,books"><?php echo $author->name;?></a>
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

