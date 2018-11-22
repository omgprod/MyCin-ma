<?php
if (isset($_SESSION['users'])){
    \Core\Router::connect('/index', ['controller' => 'user', 'action' => 'index']);
    \Core\Router::connect('/index.php', ['controller' => 'user', 'action' => 'index']);
    \Core\Router::connect('/user/index', ['controller' => 'user', 'action' => 'index']);
    \Core\Router::connect('/user/index.php', ['controller' => 'user', 'action' => 'index']);
    \Core\Router::connect('/logout', ['controller' => 'user', 'action' => 'logout']);
    \Core\Router::connect('/logout.php', ['controller' => 'user', 'action' => 'logout']);
    \Core\Router::connect('/profil', ['controller' => 'user', 'action' => 'profil']);
    \Core\Router::connect('/profil.php', ['controller' => 'user', 'action' => 'profil']);
    \Core\Router::connect('/delete', ['controller' => 'user', 'action' => 'delete']);
    \Core\Router::connect('/delete.php', ['controller' => 'user', 'action' => 'delete']);
    \Core\Router::connect('/update', ['controller' => 'user', 'action' => 'update']);
    \Core\Router::connect('/update.php', ['controller' => 'user', 'action' => 'update']);
    \Core\Router::connect('/addFilm.php', ['controller' => 'user', 'action' => 'addFilm']);
    \Core\Router::connect('/addFilm', ['controller' => 'user', 'action' => 'addFilm']);
    \Core\Router::connect('/deleteFilm', ['controller' => 'user', 'action' => 'deleteFilm']);
    \Core\Router::connect('/deleteFilm.php', ['controller' => 'user', 'action' => 'deleteFilm']);
    \Core\Router::connect('/film/index', ['controller' => 'film', 'action' => 'index']);
    \Core\Router::connect('/film/index.php', ['controller' => 'film', 'action' => 'index']);
    \Core\Router::connect('/film/show', ['controller' => 'film', 'action' => 'show']);
    \Core\Router::connect('/film/show.php', ['controller' => 'film', 'action' => 'show']);
    \Core\Router::connect('/film/update', ['controller' => 'film', 'action' => 'update']);
    \Core\Router::connect('/film/delete', ['controller' => 'film', 'action' => 'delete']);
    \Core\Router::connect('/film/add.php', ['controller' => 'film', 'action' => 'add']);
    \Core\Router::connect('/film/add', ['controller' => 'film', 'action' => 'add']);
    \Core\Router::connect('/genre/index', ['controller' => 'genre', 'action' => 'index']);
    \Core\Router::connect('/genre/add.php', ['controller' => 'genre', 'action' => 'add']);
    \Core\Router::connect('/genre/add', ['controller' => 'genre', 'action' => 'add']);
    \Core\Router::connect('/genre/update.php', ['controller' => 'genre', 'action' => 'update']);
    \Core\Router::connect('/genre/update', ['controller' => 'genre', 'action' => 'update']);
    \Core\Router::connect('/genre/delete.php', ['controller' => 'genre', 'action' => 'delete']);
    \Core\Router::connect('/chat', ['controller' => 'chat', 'action' => 'index']);
} else {
    \Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
    \Core\Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
    \Core\Router::connect('/register.php', ['controller' => 'user', 'action' => 'register']);
    \Core\Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
    \Core\Router::connect('/login.php', ['controller' => 'user', 'action' => 'login']);
    \Core\Router::connect('/user/logout', ['controller' => 'user', 'action' => 'logout']);
    \Core\Router::connect('/user/logout.php', ['controller' => 'user', 'action' => 'logout']);

    // ??
}
\Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
\Core\Router::connect('/404', ['controller' => 'error', 'action' => 'notFound']);