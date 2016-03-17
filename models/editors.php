<?php
/**
 * File: Editors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:16
 */
namespace Model;

class Editors extends Model
{
    protected $table ='editors';

    public function getEditorsByBookId($id){
        $sql = 'SELECT editors.* FROM editors JOIN books ON (editors.id=editor_id) WHERE books.id= :id';
        $pdoSt = $this->connection->prepare($sql);
        $pdoSt->execute(['id'=>$id]);
        return $pdoSt->fetchAll();
    }
}