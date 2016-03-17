<!--
/**
 * File: index_editors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:19
 */
 -->
<ul>
    <?php foreach($data['editors'] as $editor): ?>
    <li><a href="<?php echo $_SERVER['PHP_SELF']?>?a=show&e=editors&id=<?php echo $editor->id;?>&with=authors,books"><?php echo $editor->names;?></a></li>
<?php endforeach; ?>
</ul>