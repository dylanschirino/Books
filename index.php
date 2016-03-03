<?php
/**
 * File: index.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 13:44
 */
$dbConfig = parse_ini_file('db.ini');// on parcours et on extrait de l'info dedans

try {
    $dsn = sprintf('%s:dbname=%s;host=%s',$dbConfig['driver'],$dbConfig['dbname'],$dbConfig['host']);//on mets dans l'ordre les nom de driver et dbname et host
    $connection = new PDO($dsn,$dbConfig['username'],$dbConfig['password']);// Authentification a la base de données dbname biblio puis on mets le nom d'utilisateur et puis le mot de passe.

    $connection->exec('SET CHARSET SET UTF8');
    $connection->exec('SET NAMES UTF8');

}catch(PDOException $exception){
    //redirection vers une page pour afficher une erreur relative à l'exception
    die($exception->getMessage());// la flèche c'est la meme chose que le point en JS donc on va chercher une propriete d'un object
}// try va lancer une exception et on doit l'attraper avec catch on mets le type PDO exception et la variable

$sqlBooks = 'SELECT * FROM books';

$pdoSt = $connection ->query($sqlBooks);//on mets dans une variable pdo la requete puis on la mets dans $books pour la fecther, la recuperer
$books = $pdoSt->fetchAll();// pour recuper les lignes de la base de données

var_dump($books);