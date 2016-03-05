<?php
/**
 * File: authorscontroller.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 10:58
 */
function index(){
    include ('authors.php');
    $authors=getAuthors();
    $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
    return['authors'=>$authors,'view'=>$view];
}
function show(){
    include ('authors.php');

    if(isset($_GET['id'])){
        $id = intval($_GET['id']); //pour empecher les injections sql on ne prend que des entiers ici avec intval
        $author = getAuthor($id);
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
        return['author'=>$author,'view'=>$view];
    }else {
        die('il manque un identifiant a votre livre');
    }
}