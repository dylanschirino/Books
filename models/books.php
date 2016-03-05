<?php
/**
 * File: books.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 15:23
 */
function getBooks()
{
    $sqlBooks = 'SELECT * FROM books';
    $pdoSt = $GLOBALS['connection'] ->query($sqlBooks);//on mets dans une variable pdo la requete puis on la mets dans $books pour la fecther, la recuperer
    return $pdoSt->fetchAll();// pour recuper les lignes de la base de données

}
function getBook($id)
{
    $sqlBook = 'SELECT * FROM books JOIN editors ON (editors.id=editor_id) WHERE books.id= :id'; //on récupere un livre en particulier sur base de son ID
    $pdoSt = $GLOBALS['connection'] -> prepare($sqlBook);
    $pdoSt -> execute([':id'=>$id]);// on execute en remplacant par la valeur recupere dans l'url de $id
    return $pdoSt->fetch();

}