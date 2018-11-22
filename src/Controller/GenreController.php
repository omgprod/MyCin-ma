<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 20:39
 */

namespace Src\Controller;

use Core\Flash;
use Core\Controller;
use Src\Entity\GenreEntity;

class GenreController extends Controller
{
    public function indexAction()
    {
        $genre = new GenreEntity();
        $model = $genre->show();
        $this->render('index', compact('model'));
    }

    public function addAction()
    {
        if (isset($_POST))
        {
            $genre = new GenreEntity();
            $model = $genre->show();
            $res = $genre->verif($_POST['nom']);
            if ($res == null) {
                $genre->create($_POST['nom']);
                Flash::set(array("success", "Genre ajouté."));
            }else {
                Flash::set(array("danger", "Genre deja présent dans la base."));
            }
            $this->render('index', compact('model'));
        }
    }

    public function deleteAction()
    {
        if (isset($_POST))
        {
            $genre = new GenreEntity();
            $model = $genre->show();
            $genre->delete($_POST['id_genre']);
            Flash::set(array("success", "Genre supprimé."));
            $this->render('index', compact('model'));
        }
    }

    public function updateAction()
    {
        if (isset($_POST))
        {
            $genre = new GenreEntity();
            $model = $genre->show();
            $res = $genre->verif($_POST['nom']);
            if ($res == null){
                $genre->update($_POST['id_genre'], $_POST['nom']);
                Flash::set(array("success", "Genre modifié."));
            } else {
                Flash::set(array("danger", "Nom du genre deja présent sur la base."));
            }
            $this->render('index', compact('model'));
        }
    }
}