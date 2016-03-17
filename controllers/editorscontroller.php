<?php
/**
 * File: EditorsController.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:15
 */
namespace Controller;

use Model\Authors;
use Model\Books;
use Model\Editors;

class EditorsController
{
    private $editors_model = null;
    public function __construct()
    {
        $this->editors_model = new Editors();
    }

    function index()
    {
        $editors =$this->editors_model->all();
        $view = 'index_editors.php';
        $page_title='La liste des editeurs';
        return ['editors' => $editors, 'view' => $view,'page_title'=>$page_title];
    }

    function show()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); //pour empecher les injections sql on ne prend que des entiers ici avec intval
            $editor = $this->editors_model->find($id);
            $view = 'show_editors.php';
            $page_title='La Fiche de l\'editeur: '.$editor->names;

            $authors = null;
            if (isset($_GET['with'])){  //on regarde si la clé with existe si oui on explose sont contenu
                $with = explode(',',$_GET['with']);
                if(in_array('authors',$with)){ //on verifie si le mots authors est dans le tableau
                    $authors_model = new Authors(); // on crée un nouveau model des auteurs
                    $authors = $authors_model->getAuthorsByBookId($editor->id);
                }
            }
            $books = null;
            if (isset($_GET['with'])) {  //on regarde si la clé with existe si oui on explose sont contenu
                $with = explode(',', $_GET['with']);
                if (in_array('books', $with)) { //on verifie si le mots authors est dans le tableau
                    $books_model = new Books(); // on crée un nouveau model des auteurs
                    $books = $books_model->getBooksByEditorId($editor->id);
                }
            }
            return ['editor' => $editor, 'view' => $view,'page_title'=>$page_title,'authors'=>$authors,'books'=>$books];

        } else {
            die('il manque un identifiant a votre livre');
        }
    }
}