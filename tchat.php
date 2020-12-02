<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tchat_phpAjax</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital@1&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-default title1">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b>Online Quiz System</b></a>
                </div>

                <!-- Collecte les liens de la nav, des formulaires, and autres éléments pour l'affichage -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="welcome.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
                        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>> <a href="welcome.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
                        <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>> <a href="welcome.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
                        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>> <a href="liste_des_sondages.php?q=4"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Sondages</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li <?php echo''; ?>> <a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
                    </ul>




                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="chat">
            <h2>Commentez les résultats du sondage</h2>
            <div class="messages"></div>
            <div class="user-inputs">
                <form action="handler.php?task=write" method="POST">
                    <input type="text" name="author" id="author" placeholder="votre pseudo ?">
                    <input type="text" id="content" name="content" placeholder="Ecris ton commentaire !">
                    <button type="submit" id="valid">Envoyer</button>
                </form>
            </div>
        </section>
    </main>
    <script src="js/app.js"></script>
</body>

</html>
