<?php
/**
 * File: authors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 11:00
 */
function getAuthors()
{
    $sqlAuthors = 'SELECT * FROM authors';
    $pdoSt = $GLOBALS['connection'] ->query($sqlAuthors);//on mets dans une variable pdo la requete puis on la mets dans $books pour la fecther, la recuperer
    return $pdoSt->fetchAll();// pour recuper les lignes de la base de données

}
function getAuthor($id)
{
    $sqlAuthor = 'SELECT * FROM authors JOIN author_book ON (authors.id=author_id) JOIN books ON (books.id=book_id) JOIN nationalities ON (nationalities.id=authors.nationality_id) WHERE authors.id= :id'; //on récupere un livre en particulier sur base de son ID
    $pdoSt = $GLOBALS['connection'] -> prepare($sqlAuthor);
    $pdoSt -> execute([':id'=>$id]);// on execute en remplacant par la valeur recupere dans l'url de $id
    return $pdoSt->fetch();

}