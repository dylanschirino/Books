<?php
/**
 * File: editors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:16
 */
function getEditors()
{
    $sqlEditors = 'SELECT * FROM editors';
    $pdoSt = $GLOBALS['connection'] ->query($sqlEditors);//on mets dans une variable pdo la requete puis on la mets dans $books pour la fecther, la recuperer
    return $pdoSt->fetchAll();// pour recuper les lignes de la base de données

}
function getEditor($id)
{
    $sqlEditor = 'SELECT * FROM editors WHERE id= :id'; //on récupere un livre en particulier sur base de son ID
    $pdoSt = $GLOBALS['connection'] -> prepare($sqlEditor);
    $pdoSt -> execute([':id'=>$id]);// on execute en remplacant par la valeur recupere dans l'url de $id
    return $pdoSt->fetch();

}