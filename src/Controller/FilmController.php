<?php

namespace Src\Controller;

use Core\Flash;
use Core\Controller;
use Src\Entity\FilmEntity;
use Src\Entity\GenreEntity;

class FilmController extends Controller
{
    public function indexAction()
    {
        $genre = new GenreEntity();
        $film = new FilmEntity();
        $req = $genre->show();
        $res = $film->show();
        $this->render('index', compact('res', 'req', 'list'));
    }

    public function deleteAction()
    {
        if ($_POST) {
            $film = new FilmEntity();
            $genre = new GenreEntity();
            $film->delete($_POST['id']);
            $req = $genre->show();
            $res = $film->show();
            Flash::set(array("success", "Film supprimé."));
            $this->render('index', compact('res', 'req'));
        }
    }

    public function showAction()
    {
        if (isset($_POST)) {
            $film = new FilmEntity();
            $res = $film->detail($_POST['id'])[0];
            $genre = new GenreEntity();
            $req = $genre->show();
            $show = $film->poster($res['titre']);
            $this->render('show', compact('res', 'req', 'show'));
        }
    }

    public function updateAction()
    {
        if (isset($_POST)) {
            $genre = new GenreEntity();
            $film = new FilmEntity();
            $film->update($_POST['id_film'], $_POST);
            $res = $genre->show();
            $req = $film->show();
            Flash::set(array("success", "Film modifié."));
            $this->render('show', compact('res', 'req'));
        }
    }

    public function addAction()
    {
        if (isset($_POST)) {
            $film = new FilmEntity();
            $twice = new FilmEntity();
            $res = $film->show();
            $genre = new GenreEntity();
            $show = $genre->show();
            $req = $film->insert($_POST['titre']);
            if ($req == false){
                $twice->create($_POST);
                Flash::set(array("success", "Film ajouté."));
                $this->render('index', compact('res', 'show', 'twice'));
            } else {
                Flash::set(array("danger", "Film présent dans la base."));
                $this->render('index', compact('res', 'show', 'twice'));
            }

        }
    }

}
