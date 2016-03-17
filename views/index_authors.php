<!--
/**
 * File: index_authors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 11:04
 */
 -->
<ul>
    <?php foreach($data['authors'] as $author): ?>
    <li><a href="<?php echo $_SERVER['PHP_SELF']?>?a=show&e=authors&id=<?php echo $author->id;?>&with=books,editors"><?php echo $author->name;?></a></li>
<?php endforeach; ?>
</ul>