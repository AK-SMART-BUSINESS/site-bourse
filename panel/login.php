<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel-Connexion</title>
    <link rel="stylesheet" href="../f/ui/css/uikit.min.css">

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../f/ui/js/uikit.min.js" charset="utf-8"></script>
    <script src="../f/ui/js/uikit-icons.min.js" charset="utf-8"></script>

    <script src="../f/ckeditor/ckeditor.js" charset="utf-8"></script>
</head>
<body>
    <div class="uk-alert uk-alert-warning uk-position-top-center uk-width-1-4@m uk-width-expand@s uk-position-z-index" uk-alert id="info"></div>

    <div class="uk-position-center uk-width-1-4@m uk-width-expand@s uk-height-medium uk-background-muted uk-padding-small" id="panelFrmContainer">
        <h1 class="uk-text-center">Panel</h1>
        <form method="post" id="frmLog">
            <div class="uk-margin">
                <label for="login" class="uk-label">Login</label>
                <input type="text" class="uk-input" id="log" placeholder="Identifiant">
            </div>
            <div class="uk-margin">
                <label for="login" class="uk-label">Password</label>
                <input type="password" class="uk-input" id="pwd" placeholder="Mot de passe">
            </div>
            <div class="uk-margin uk-text-center">
                <button type="submit" id="btnLog" class="uk-button uk-button-danger">Connexion</button>
            </div>
        </form>
        <a href="">Mot de pass oublié ?</a>
    </div>

    <script src="js/log.js"></script>
</body>
</html>