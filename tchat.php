<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tchat_phpAjax</title>
  <link rel="stylesheet" href="css/app.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link  rel="stylesheet" href="css/bootstrap.min.css"/>
  <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
  <link rel="stylesheet" href="css/welcome.css">
  <link  rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
            <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="welcome.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
            <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>> <a href="welcome.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
            <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>> <a href="welcome.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
            <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>> <a href="tchat.php?q=4"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Résultat/Tchat</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li <?php echo''; ?> > <a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
        </ul>
        
            
           
       
        </div>
    </div>
    </nav>
  </header>
  <main>
    <h1>Résultats du sondage</h1>
           <h2 class="titre"></h2>
    <?php
    if(@$_GET['q']== 'result' && @$_GET['eid']) 
    {
        $eid=@$_GET['eid'];
        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
        echo  '<div class="panel">
        <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['score'];
            $w=$row['wrong'];
            $r=$row['sahi'];
            $qa=$row['level'];
            echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
                <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
                <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
        }
        $q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['score'];
            echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
        }
        echo '</table></div>';
    }
 ?>
 
  <section class="chat">
    <h2>Commentez les résultats du sondage</h2>
      <div class="messages"></div>
      <div class="user-inputs">
      <form action="result_tchat.php?task=write" method="POST">
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