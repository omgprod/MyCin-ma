<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <link href="http://localhost/PiePHP/webroot/css/Styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="http://localhost/PiePHP/webroot/js/jquery.dataTables.js"></script>
    <title>MyFramework</title>
</head>
<body>
<?php if (!empty($_SESSION)): ?>
    <?php include('User/nav.php'); ?>
<?php endif ?>
<?php if (isset($flash)) : ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-<?= $flash["type"] ?>" role="alert">
            <?= $flash["message"] ?>
        </div>
    </div>
<?php endif ?>
<?= $view ?>
<script  src="http://localhost/PiePHP/webroot/js/chat.js"></script>
<script  src="http://localhost/PiePHP/webroot/js/DataTable.js"></script>
</body>
</html>


