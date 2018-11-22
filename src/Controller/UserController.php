<?php

namespace src\Controller;

use Core\Flash;
use Core\Controller;
use Core\Database;
use Src\Entity\FilmEntity;
use Src\Entity\HistoriqueEntity;
use Src\Entity\UserEntity;
use Src\Model\UserModel;

class UserController extends Controller
{

    public function registerAction()
    {
        if (isset($_POST['email'], $_POST['password'])
            && !empty($_POST['email']) && !empty($_POST['password'])) {
            $user = new UserEntity();
            $res = $user->read_all($_POST['email']);
            if (empty($res)) {
                $user->create($_POST);
                Flash::set(array("success", "Compte crée."));
                $this->render('login');
            } elseif (!empty($res)){
                Flash::set(array("danger", "Email deja enregistré."));
                $this->render('register');
            }
        } else {
            $this->render('register');
        }
    }


    public function loginAction()
    {
        if (isset($_POST['email'], $_POST['password'])
            && !empty($_POST['email']) && !empty($_POST['password'])) {
            $model = new UserEntity();
            $response = $model->login($_POST);
            echo $response;
            header('Location:' . BASE_URI . '/index');
        } else {
            $this->render('login');
        }
    }

    public function indexAction()
    {
        $model = new UserEntity();
        $h = new HistoriqueEntity();
        $user = $model->read($_SESSION['users']['id_user']);
        $film = new FilmEntity();
        $list = $film->listFilm();
        $show = $film->show();
        $this->render('index', compact('user', 'h', 'show', 'list'));
    }

    public function profilAction()
    {
        $model = new UserEntity();
        $h = new HistoriqueEntity();
        $user = $model->read($_SESSION['users']['id_user']);
        $film = new FilmEntity();
        $film = $film->show();
        $this->render('profil', compact('user', 'h', 'film'));
    }

    public function updateAction()
    {
        if (isset($_POST)) {
            $model = new UserEntity();
            $model->update($_SESSION['users']['id_user'], $_POST);
            Flash::set(array("success", "Profile modifié"));
            header('Location:' . BASE_URI . '/profil');
        }
    }

    public function logoutAction()
    {
        if (isset($_POST)) {
            unset($_SESSION['users']);
            header('Location:' . BASE_URI . '/');
        }
    }

    public function deleteAction()
    {
        if (isset($_POST)) {
            $model = new UserEntity();
            $model->delete($_SESSION['users']['id_user']);
            unset($_SESSION['users']);
            header('Location:' . BASE_URI . '/login');
        }
    }

    public function deleteFilmAction()
    {
        if (isset($_POST)) {
            $h = new HistoriqueEntity();
            $model = new UserEntity();
            $user = $model->read($_SESSION['users']['id_user']);
            $film = new FilmEntity();
            $film = $film->show();
            $h->delete($_POST['id_film']);
            $this->render('profil', compact('film', 'h', 'user'));
            Flash::set(array("success", "Film supprimé de l'historique."));
        }
        $this->render('profil', compact('h', 'film', 'user'));
    }

    public function addFilmAction()
    {
        if (isset($_POST)) {
            $h = new HistoriqueEntity();
            $model = new UserEntity();
            $user = $model->read($_SESSION['users']['id_user']);
            $film = new FilmEntity();
            $film = $film->show();
            $res = $h->read($_POST['id_film']);
            if (empty($res)) {
                $h->create($_POST['id_film']);
                Flash::set(array("success", "Film ajouté dans la base"));
                $this->render('profil', compact('h', 'film', 'user'));
            } elseif (!empty($res)) {
                Flash::set(array("danger", "Film deja dans la base"));
                $this->render('profil', compact('h', 'film', 'user'));
            }
            $this->render('profil', compact('h', 'film', 'user'));
        }
    }
}
