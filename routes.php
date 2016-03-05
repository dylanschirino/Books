<?php
/**
 * File: routes.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 16:56
 */
//On definit les 2 routes qu'on autorise
$tab=['books','editors','authors'];
    $routes = [
        'default' => 'index_' . $tab[1] ,
        'showbooks' => 'show_' . $tab[1]
    ];


