<?php
/**
 * File: AuthorsController.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 10:58
 */
namespace Controller;

use Model\Authors;

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
            return ['author' => $author, 'view' => $view,'page_title'=>$page_title];
        } else {
            die('il manque un identifiant a votre livre');
        }
    }
}