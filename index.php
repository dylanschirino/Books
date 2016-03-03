<?php
/**
 * File: index.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 13:44
 */
try {
    $connection = new PDO('mysql:dbname=biblio;host=localhost', 'root', 'root');// Authentification a la base de données dbname biblio puis on mets le nom d'utilisateur et puis le mot de passe.

    $connection->exec('SET CHARSET SET UTF8');
    $connection->exec('SET NAMES UTF8');

}catch(PDOException $exception){
    //redirection vers une page pour afficher une erreur relative à l'exception
    die($exception->getMessage());// la flèche c'est la meme chose que le point en JS donc on va chercher une propriete d'un object
}// try va lancer une exception et on doit l'attraper avec catch on mets le type PDO exception et la variable