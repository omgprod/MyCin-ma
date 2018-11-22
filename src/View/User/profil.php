<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 02/10/2018
 * Time: 20:15
 */
?>
<h1>PROFILE</h1>

<div class="profile">
    <div class="row">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="content-profile" style="align-items:center">

                    <h4 style="margin-top: 20px">Modifier :</h4><br>
                    <form method="post" action="update">
                        <label>Email <input name="email" type="email"></label>
                        <label>Mot de passe <input name="password" type="password"></label><br><br>
                        <button class="btn btn-danger" type="submit">Modifier</button>
                    </form>

                    <h4 style="margin-top: 20px">Supprimer :</h4>
                    <form method="post" action="delete"><br>
                        <button class="btn btn-danger" type="submit">Supprimer le profil</button>
                    </form>

                    <h4 style="margin-top: 20px">Supprimer un film vue :</h4><br>
                    <form method="post" action="deleteFilm">
                        <select name="id_film" id="">
                            <?php foreach ($user as $item): ?>
                                <option value="<?= $item['id_film']; ?>"><?= $h->read($item['id_film'])[0]['titre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn btn-danger" type="submit">Supprimer le film</button>
                    </form>

                    <h4 style="margin-top: 20px">Ajouter un film vue :</h4><br>
                    <form method="post" action="addFilm.php">
                        <select name="id_film" id="id_film">
                            <?php foreach ($film as $item): ?>
                                <option value="<?= $item['id_film']; ?>"><?= $item['titre']; ?></option>
                            <?php endforeach; ?>
                        </select><br>
                        <button class="btn btn-danger" type="submit">Ajouter le film</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="information-profile" style="margin-top: 40px">
                <div class="information-content">
                    <p><strong>Identifiant:</strong> <?= $_SESSION['users']['id_user']; ?></p>
                    <p><strong>Email:</strong> <?= $user[0]['email']; ?></p>
                    <p><strong>Nombre de films vue:</strong> <?= count($user); ?></p>
                </div>
            </div>
        </div>
    </div>
</div><br>

