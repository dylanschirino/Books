<?php

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
            return ['book' => $book, 'view' => $view,'page_title'=>$page_title];
        } else {
            die('il manque un identifiant a votre livre');
        }
    }
}
