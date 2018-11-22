<h1>Fiche Film</h1>
<div class="row">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="d-flex justify-content-center">
                   <?php if ($show == !null)
                       echo $show; ?>
                </div>
            </div>
        </div>
        <strong>ID : <?= $res['id_film']; ?></strong><br><br>
        <strong>Titre : <?= $res['titre']; ?></strong><br><br>
        <strong>Genre : <?= $res['nom']; ?></strong><br><br>
        <strong>Résumé : <?= $res['resum']; ?></strong><br><br>
        <div class="d-flex justify-content-center">
            <form method='post' action='delete'>
                <input type='hidden' name='id' value='<?= $res['id_film']; ?>'>
                <button class="btn btn-danger" type='submit'>Supprimer</button>
            </form>
            <br>
        </div>
    </div>
</div>

<h1>Modifier</h1>
<div class="row">
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="update" method="post">
                <input type='hidden' name='id_film' value='<?= $res['id_film']; ?>'>
                <label for="title">Titre</label><br>
                <input id="title" name="titre" type="text" value="<?= $res['titre']; ?>"><br>
                <label for="resum">Resumé</label><br>
                <textarea cols="50" rows="15" id="resum" name="resum"><?= $res['resum']; ?></textarea><br>
                <label for="genre">Genre</label>
                <select name="id_genre" id="genre">
                    <?php foreach ($req as $g): ?>
                        <option value="<?= $g['id_genre']; ?>">
                            <?= $g['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>
                    <button class="btn btn-danger" type="submit">Modifier</button>
            </form>
        </div>
    </div>
</div>