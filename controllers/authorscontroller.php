<?php
/**
 * File: AuthorsController.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 10:58
 */
namespace Controller;

use Model\Authors;
use Model\Books;
use Model\Editors;

class AuthorsController
{
    private $authors_model = null;
    public function __construct()
    {
        $this->authors_model = new Authors();
    }

    function index()
    {

        $authors =$this->authors_model->all();
        $view = 'index_authors.php';
        $page_title='La liste des auteurs';
        return ['authors' => $authors,'view' => $view,'page_title'=>$page_title];
    }

    function show()
    {
        //include('Authors.php');
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); //pour empecher les injections sql on ne prend que des entiers ici avec intval
            $author =$this->authors_model->find($id);
            $view = 'show_authors.php';
            $page_title='La Fiche de l\'auteur: '.$author->name;

            $editors = null;
            if (isset($_GET['with'])) {  //on regarde si la clé with existe si oui on explose sont contenu
                $with = explode(',', $_GET['with']);
                if (in_array('editors', $with)) { //on verifie si le mots authors est dans le tableau
                    $editors_model = new Editors(); // on crée un nouveau model des auteurs
                    $editors = $editors_model->getEditorsByBookId($author->id);
                }
            }
            $books = null;
            if (isset($_GET['with'])) {  //on regarde si la clé with existe si oui on explose sont contenu
                $with = explode(',', $_GET['with']);
                if (in_array('books', $with)) { //on verifie si le mots authors est dans le tableau
                    $books_model = new Books(); // on crée un nouveau model des auteurs
                    $books = $books_model->getBooksByEditorId($author->id);
                }
            }
            return ['author' => $author, 'view' => $view,'page_title'=>$page_title,'editors'=>$editors,'books'=>$books];
        } else {
            die('il manque un identifiant a votre livre');
        }
    }
}