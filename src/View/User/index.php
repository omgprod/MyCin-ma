<div class="row">
    <div class="container">
        <div class="d-flex justify-content-center" style="margin-top: 30px">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h2 class="display-4">Bienvenue, <?= $user[0]['email']; ?> !</h2><br>
                    <p class="lead">MyCinéma est un site dédié a la gestion d'une BDD, le tout monté en MVC avec
                        MyFramework,
                        c'est én'ORM'e ! </p>
                    <hr class="my-4">
                    <p>Pour plus d'information consulter le bouton plus bas.</p><br>
                    <p class="lead">
                        <a class="btn btn-danger btn-lg" href="#" role="button">Informations</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<h1>Film vues par votre compte :</h1>
<div class="row">
    <div class="container">
        <div class="d-flex justify-content-center" style="margin-top: 30px">
            <div class="jumbotron jumbotron-fluid">
                <?php foreach ($user as $item): ?>
                    <option value="<?= $item['id_film']; ?>"><?= $h->read($item['id_film'])[0]['titre']; ?></option>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
