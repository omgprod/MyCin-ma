<div class="col-sm">
    <p>PiePHP My Fucking Ciné-Framework!</p>
</div>
<!-- CONNEXION -->
<div class="row">
    <div class="container">
        <div class="col-sm-4">
            <section id="connexion">
                <div class="login">
                    <h1>Login</h1>
                    <form method="post" style="margin-left: 5%;margin-right: 5%;">
                        <input type="text" name="email" placeholder="Email" required="required"/>
                        <input type="password" name="password" placeholder="Mot de passe" required="required"/>
                        <button type="submit" class="btn btn-danger" style="margin: 10px;">Laisse moi rentrer!</button>
                        <input class="btn btn-danger" style="margin: 10px;" type="button" id="no-account"
                               value="Pas de compte?"
                               onclick="window.location.href='http://www.localhost/PiePHP/register'"/>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
