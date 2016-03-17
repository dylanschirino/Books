<?php

namespace Controller;

use Model\Authors;
use Model\Books;
use Model\Editors;

class BooksController
{
    private $books_model = null;
    public function __construct()
    {
        $this->books_model = new Books();
    }

    function index()
    {
        $books =$this->books_model->all();
        $view = 'index_books.php';
        $page_title='La liste des livres';
        return ['books' => $books, 'view' => $view,'page_title'=>$page_title];
    }

    function show()
    {

        if (isset($_GET['id'])) {

            $id = intval($_GET['id']); //pour empecher les injections sql on ne prend que des entiers ici avec intval
            $book =$this->books_model->find($id);
            $view = 'show_books.php';
            $page_title='La fiche du livre&nbsp;: '.$book->title;

            $authors = null;
            if (isset($_GET['with'])){  //on regarde si la clé with existe si oui on explose sont contenu
                $with = explode(',',$_GET['with']);
                if(in_array('authors',$with)){ //on verifie si le mots authors est dans le tableau
                    $authors_model = new Authors(); // on crée un nouveau model des auteurs
                    $authors = $authors_model->getAuthorsByBookId($book->id);
                }

            }
            $editors = null;
            if (isset($_GET['with'])) {  //on regarde si la clé with existe si oui on explose sont contenu
                $with = explode(',', $_GET['with']);
                if (in_array('editors', $with)) { //on verifie si le mots authors est dans le tableau
                    $editors_model = new Editors(); // on crée un nouveau model des auteurs
                    $editors = $editors_model->getEditorsByBookId($book->id);
                }
            }
            return ['book' => $book, 'view' => $view,'page_title'=>$page_title,'authors'=>$authors,'editors'=>$editors];

        } else {
            die('il manque un identifiant a votre livre');
        }
    }
}
