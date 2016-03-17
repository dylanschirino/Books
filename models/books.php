<?php
/**
 * File: Books.php
 * User: Dylan Schirino
 * Date: 3/03/16
 * Time: 15:23
 */
namespace Model;

class Books extends Model
{
    protected $table ='books';

    public function getBooksByEditorId($id){
        $sql = 'SELECT books.* FROM books JOIN editors ON (editors.id=editor_id) WHERE editors.id=:id
        ';
        $pdoSt = $this->connection->prepare($sql);
        $pdoSt->execute(['id'=>$id]);
        return $pdoSt->fetchAll();
    }

    public function getBooksByAuthorId($id){
        $sql = 'SELECT books.* FROM books JOIN authors ON (authors.id=author_id) WHERE authors.id=:id
        ';
        $pdoSt = $this->connection->prepare($sql);
        $pdoSt->execute(['id'=>$id]);
        return $pdoSt->fetchAll();
    }

}