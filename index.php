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

spl_autoload_register(function($class){
    include($class.'.php');
});


include ('routes.php');

$defaultRoute=$routes['default'];
$routeParts=explode('_',$defaultRoute);

$a = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0];// affichera index
$e = isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];// affichera books, les mots decrivent les actions a faire



if (!in_array($a.'_'.$e,$routes)){
    //redirection 404
    die('Ce que vous cherchez n\'est pas ici');
}

$controller_name = ucfirst($e).'Controller';//on mets la premiere lettre en majuscule

$controller = new $controller_name();
$data = call_user_func([$controller,$a]);//ca nous renvoye des données qu'on stocke dans data


include('view.php');//affiche les titres des livres.