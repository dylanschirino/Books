<?php
/**
 * File: EditorsController.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:15
 */
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
            return ['editor' => $editor, 'view' => $view,'page_title'=>$page_title];
        } else {
            die('il manque un identifiant a votre livre');
        }
    }
}