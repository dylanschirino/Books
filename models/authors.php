<?php
/**
 * File: Authors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 11:00
 */
namespace Model;

class Authors extends Model
{
    protected $table ='authors';

    public function getAuthorsByBookId($id){
        $sql = 'SELECT authors.* FROM authors JOIN author_book ON authors.id=author_book.author_id JOIN books ON
books.id=book_id WHERE books.id = :id';
        $pdoSt = $this->connection->prepare($sql);
        $pdoSt->execute(['id'=>$id]);
        return $pdoSt->fetchAll();
    }
}