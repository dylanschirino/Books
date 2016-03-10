<?php
/**
 * File: index.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 13:44
 */
$viewDir = __DIR__.'/views';//on concate de la racine de l'ordi a views __DIR__ c'est la racine
$modelsDir= __DIR__.'/models';
$controllersDir= __DIR__.'/controllers';
set_include_path($viewDir.PATH_SEPARATOR.$modelsDir.PATH_SEPARATOR.$controllersDir.PATH_SEPARATOR.get_include_path());//on ajoute le repertoire des vues a la liste des repertoires
$dbConfig = parse_ini_file('db.ini');// on parcourt et on extrait de l'info dedans

$pdoOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];//pour avoir un tableau d'objet

try {
    $dsn = sprintf('%s:dbname=%s;host=%s',$dbConfig['driver'],$dbConfig['dbname'],$dbConfig['host']);//on mets dans l'ordre les nom de driver et dbname et host
    $connection = new PDO($dsn,$dbConfig['username'],$dbConfig['password'],$pdoOptions);// Authentification a la base de données dbname biblio puis on mets le nom d'utilisateur et puis le mot de passe et les options de pdo

    $connection->exec('SET CHARACTER SET UTF8');
    $connection->exec('SET NAMES UTF8');

}catch(PDOException $exception){
    //redirection vers une page pour afficher une erreur relative à l'exception
    die($exception->getMessage());// la flèche c'est la meme chose que le point en JS donc on va chercher une propriete d'un object
}// try va lancer une exception et on doit l'attraper avec catch on mets le type PDO exception et la variable

include ('routes.php');

$defaultRoute=$routes['default'];
$routeParts=explode('_',$defaultRoute);

$a = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0];// affichera index
$e = isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];// affichera books, les mots decrivent les actions a faire



if (!in_array($a.'_'.$e,$routes)){
    //redirection 404
    die('Ce que vous cherchez n\'est pas ici');
}

include($e.'controller.php');

$data = call_user_func($a);//ca nous renvoye des données qu'on stocke dans data

include('view.php');//affiche les titres des livres.