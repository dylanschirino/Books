<?php
/**
 * File: index.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 13:44
 */
require 'vendor/autoload.php';

include ('routes.php');

$defaultRoute=$routes['default'];
$routeParts=explode('_',$defaultRoute);

$a = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0];// affichera index
$e = isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];// affichera books, les mots decrivent les actions a faire

if (!in_array($a.'_'.$e,$routes)){
    //redirection 404
    die('Ce que vous cherchez n\'est pas ici');
}

$controller_name = 'Controller\\'.ucfirst($e).'Controller';//on mets la premiere lettre en majuscule

$controller = new $controller_name();
$data = call_user_func([$controller,$a]);//ca nous renvoye des données qu'on stocke dans data

include('views/view.php');//affiche les titres des livres.