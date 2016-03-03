<?php
/**
 * File: index.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 13:44
 */
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

if(isset($_GET['id'])){
    $id = intval($_GET['id']); //pour empecher les injections sql on ne prend que des entiers ici avec intval
    $sqlBook = 'SELECT * FROM books WHERE id= :id'; //on récupere un livre en particulier sur base de son ID
    $pdoSt = $connection -> prepare($sqlBook);
    $pdoSt -> execute([':id'=>$id]);// on execute en remplacant par la valeur recupere dans l'url de $id
    $book=$pdoSt->fetch();
    $view ='singlebook.php';
}else{
    $sqlBooks = 'SELECT * FROM books';
    $pdoSt = $connection ->query($sqlBooks);//on mets dans une variable pdo la requete puis on la mets dans $books pour la fecther, la recuperer
    $books = $pdoSt->fetchAll();// pour recuper les lignes de la base de données
    $view = 'allbooks.php';
}


include ('view.php');//affiche les titres des livres.