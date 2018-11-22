<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 21:13
 */
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>" >🎞 My Cinema 🎬</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/PiePHP/profil">Profile <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/PiePHP/film/index">Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/PiePHP/genre/index">Genre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/PiePHP/logout">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>
