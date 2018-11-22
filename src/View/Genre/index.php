<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 20:38
 */
?>
<h1>Genre</h1><br>
<div class="row">
    <div class="container">
        <div class="d-flex justify-content-center">
        <div class="col-md-3" style="margin-top: 20px">
            <h2>Modifier:</h2>
            <form action="update.php" method="post">
                <label for="genre" style="margin-top: 5px">Genre :</label>
                <select name="id_genre" id="genre" style="margin-top: 5px">
                    <?php foreach ($model as $g): ?>
                        <option value="<?= $g['id_genre']; ?>"><?= $g['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>
                    Nouveau nom
                    <input name="nom" type="text" style="margin-top: 5px">
                </label>
                <button class="btn btn-danger" type="submit" style="margin-top: 5px">Modifier</button>
            </form>
            <br>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-6" style="margin-top: 20px">
                <h2>Supprimer:</h2>
                <form action="delete.php" method="post">
                    <label for="genre" style="margin-top: 5px">Genre :</label>
                    <select name="id_genre" id="genre" style="margin-top: 5px">
                        <?php foreach ($model as $g): ?>
                            <option value="<?= $g['id_genre']; ?>"><?= $g['nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-danger" type="submit" style="margin-top: 5px"> Supprimer</button>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-6" style="margin-top: 20px">
                <h2>Ajouter:</h2>
                <form action="add.php" method="post">
                    <label>Nom :<input name="nom" type="text" style="margin-top: 5px"></label>
                    <button class="btn btn-danger" type="submit" style="margin-top: 5px"> Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <h1 style="margin-top: 20px"></h1>



