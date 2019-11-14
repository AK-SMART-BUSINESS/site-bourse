<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WepApp-Login</title>
    <link rel="stylesheet" href="f/ui/css/uikit.min.css">
    <!--link rel="stylesheet" href="f/ui/css/uikit-rtl.min.css"-->
    <!--link rel="stylesheet" href="css/login.css"-->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="f/ui/js/uikit.min.js" charset="utf-8"></script>
    <script src="f/ui/js/uikit-icons.min.js" charset="utf-8"></script>
</head>
<body>
  <div class="uk-width-medium uk-position-center">
    <div class="top" style="text-align:center;font-size:22px;">
      <p>Connexion</p>
    </div>
    <div id="errBloc">

    </div>
    <form class="uk-form-stacked" id="logFrm">
      <div>
        <label for="email" class="uk-form-label">Login</label>
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input type="text" id="email" class="uk-input uk-width-medium" placeholder="Votre identifiant">
        </div>
      </div>
      <div>
        <label for="pass" class="uk-form-label">Mot de pass</label>
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: lock"></span>
            <input type="password" id="pass" class="uk-input uk-width-medium" placeholder="Votre mot de pass">
        </div>
      </div>
      <div class="uk-margin" style="overflow:hidden">
          <button type="submit" id="btn" class="uk-button uk-button-primary" style="float:right">
            <span uk-icon="icon: sign-in"></span> Me connecter
          </button>
      </div>
    </form>
  </div>

  <script src="js/login.js" charset="utf-8"></script>
</body>
</html>
