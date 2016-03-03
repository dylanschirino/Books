<?php
/**
 * File: bookscontroller.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 16:26
 */

function index(){
    include ('books.php');
    $books=getBooks();
    $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
    return['books'=>$books,'view'=>$view];
}
function show(){
    include ('books.php');

    if(isset($_GET['id'])){
        $id = intval($_GET['id']); //pour empecher les injections sql on ne prend que des entiers ici avec intval
        $book = getBook($id);
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
        return['book'=>$book,'view'=>$view];
    }else {
        die('il manque un identifiant a votre livre');
    }
}
