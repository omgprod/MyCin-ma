<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 04/10/2018
 * Time: 15:07
 */
?>
<h1>Ajouter un Film :</h1>
<div class="row">
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="add.php" method="post">
                <label for="title">Titre</label><br>
                <input id="title" name="titre" type="text" value="Titre"><br>
                <label for="resum">Resumé</label><br>
                <textarea cols="50" rows="15" id="resum" name="resum">
            </textarea><br>
                <label for="genre">Genre</label>
                <select name="id_genre" id="genre">
                    <?php foreach ($req as $g): ?>
                        <option value="<?= $g['id_genre']; ?>">
                            <?= $g['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-danger" type="submit">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<h1>Modifier ou consulter un Film :</h1>
<div class="row">
    <div class="container">
        <div class="upper d-flex justify-content-center" style="margin-top: 30px">
            <table id="film" class="display" width="70%">
                <thead>
                <tr>
                    <th>titre</th>
                    <th>première affiche</th>
                    <th>dernière affiche</th>
                    <th>durée min</th>
                    <th>voir</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($res as $val): ?>
                    <tr>
                        <td><?= $val['titre'] ?></td>
                        <td><?= $val['date_debut_affiche'] ?></td>
                        <td><?= $val['date_fin_affiche'] ?></td>
                        <td><?= $val['duree_min'] ?></td>
                        <?= "<form method='post' action='show'>
            <input type='hidden' name='id' value='" . $val['id_film'] . "'>
            <td><button type='submit' class=\"btn btn-danger\">Voir</button></td></form>"?>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row" style="display: none">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-md-6"
            <?php foreach ($res as $r): ?>
                <?= '<h4>' . $r['id_film'] . "-" . $r['titre'] . '</h4>' ?>
                <?= "<form method='post' action='show'>
            <input type='hidden' name='id' value='" . $r['id_film'] . "'>
            <button type='submit' class=\"btn btn-danger\">Voir</button></form><br>" ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>




