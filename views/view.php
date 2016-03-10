<!doctype html>
<html lang="fr">
    <head>
        <meta charset ="UTF-8">
        <title><?php echo $data['page_title'];?></title>
    </head>
    <body>
    <?php include ('partials/_main_navigation.php'); ?>
    <?php  include($data['view']); ?>
</body>
</html>