<!doctype html>
<html lang="fr">
    <head>
        <meta charset ="UTF-8">
        <title>Books</title>
    </head>
    <body>
        <ul>
    <?php foreach($books as $book): ?>
        <li><?php echo $book->title;?></li>
            <?php endforeach; ?>
</body>
</html>