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
        <a href="<?php echo $data['editor']->url;?>">Site Internet de l'éditeur</a>
    </div>
<?php endif; ?>
<?php if($data['editor']->summary): ?>
    <div class="summary">
        <?php echo 'Résumé : '.$data['editor']->summary;?>
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
<?php if($data['authors']): ?>
    <h2>Auteurs&nbsp;:</h2>
    <ul class="auteur">
        <?php foreach($data['authors'] as $author) : ?>
            <li class="author">
                <a href="?a=show&e=authors&id=<?php echo $author->id;?>&with=editors,books"><?php echo $author->name;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if($data['books']): ?>
    <h2>Livres&nbsp;:</h2>
    <ul class="livre">
        <?php foreach($data['books'] as $book) : ?>
            <li class="author">
                <a href="?a=show&e=books&id=<?php echo $book->id;?>&with=authors,editors"><?php echo $book->title;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
