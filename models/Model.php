<?php

/**
 * File: Model.php
 * User: Dylan Schirino
 * Date: 10/03/16
 * Time: 15:35
 */
class Model
{
    protected $table='';
    public function all()
    {
        $sql = sprintf('SELECT * FROM %s',$this->table);
        $pdoSt = $GLOBALS['connection']->query($sql);//on mets dans une variable pdo la requete puis on la mets dans $books pour la fecther, la recuperer
        return $pdoSt->fetchAll();// pour recuper les lignes de la base de données

    }

    public function find($id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id',$this->table); //on récupere un livre en particulier sur base de son ID
        $pdoSt = $GLOBALS['connection']->prepare($sql);
        $pdoSt->execute([':id' => $id]);// on execute en remplacant par la valeur recupere dans l'url de $id
        return $pdoSt->fetch();

    }
}