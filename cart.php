<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Panier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    #header { background-image: url("a4.jpg"); height: 400px;margin-bottom: 50px; background-size: cover;}
    #header h2 { color: black; margin-left: 450px; padding: 100px;}
     li {text-align: center; padding-left: 10px; padding-right: 10px; }
    table {margin-right:auto; margin-left:auto; text-align: center;}
    th {text-align: center; color: #5a5a5a; font-size: 30px;}
    td {padding: 20px; color: blue; }
    #foot{
    padding: 40px;
    background-color: black;
    }
    #foot table {
      margin-left:200px;
      margin-top: 20px;
    }
    #foot h3 {
      margin-left: 200px;
    }

    #foot table tr th {
      width: 200px;
      cursor: pointer;  
    }

    #foot table tr th a{
      text-decoration: none;
    }
     .modal-header, h4, .close {
      background-color: blue;
      color:white !important;
      text-align: center;
      font-size: 30px;
    }
    .modal-footer {
        background-color: #f9f9f9;
    }
    #signUP {
    color: white;
    background-image: url("abc.jpg");
    background-color: transparent;
    background-size: cover;
    height: 800px;
  }

    #signUP .form-group input {
    background-color:  transparent;
   }

    #signUP h3 {
    margin-left: 300px;
    color: white;
    font-size: 40px;
  }
   #form {
    float:  left; 
    margin-left: 150px;
    width: 700px;
    margin-top: 20px;
  }

#aa {
    background-color: transparent;
    float: right;
    width: 100px; 
    height: 50px;
    font-size: 20px;
  }


   </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div>
      <ul class="nav navbar-nav">
        <li><a href="pageAccueill.php">Home</a></li>
        <li><a href="lesAlbums.php">Albums</a></li>
        <li class="active">
          <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">Rechercher par<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="compositeur.php">Compositeur</a></li>
           <li><a href="inteprete.php">Interprète</a></li>
          <li><a href="instrument.php">Instrument</a></li>
          <li><a href="genreChoix.php">Genre</a></li>
          </ul>
        </li>
        <li>
          <a href="orchestre.php">Orchestres</a>
        </li>
        <li ><a href="presentation.php">Presentation</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
            <?php
            if(empty($_SESSION["NOM_USER"])) {
            echo "<li><a href=\"#\" id=\"myBtn\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
                  <li><a href=\"#signUP\"><span class=\"glyphicon glyphicon-user\" ></span> Sign Up</a></li>";
            }
            else {
            echo "<li><a href=\"profil.php\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION["NOM_USER"]."</a></li>
                  <li><a href=\"cart.php\"><span class=\"glyphicon glyphicon-shopping-cart\"></span>Panier</a></li>
                  <li><a href=\"deconnect.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Deconnection</a></li>
                  <li><a href=\"#signUP\"><span class=\"glyphicon glyphicon-user\" ></span> Sign Up</a></li>";
            }
            ?>
      </ul>
    </div>
</nav>
<div>
<div id="header">
</div>
 <?php
  if (!isset($_SESSION['panier'])){
    echo "<h1 align=\"center\"> LE PANIER EST VIDE </h1>";
  }
  else {
  $prix = 1;
  $som = 0;
  $code_morceau = explode(",", $_SESSION['panier']);
  $dem = count($code_morceau);
   echo 
      "<table class=\"table table-bordered\">";
        echo"<tr><th>TITRE MORCEAU</th><th>PRIX UNITAIRE</th></tr>";
  for($i=0;$i<$dem;$i++){
    $driver = 'sqlsrv';$host = 'INFO-SIMPLET';$nomDb = 'Classique_Web';
  $user = 'ETD';$password = 'ETD';
  $pdodsn = "$driver:Server=$host;Database=$nomDb";
  // Connexion PDO
  $pdo = new PDO($pdodsn, $user, $password);
    $query = "select Enregistrement.Titre, Enregistrement.Prix
          FROM Enregistrement WHERE Enregistrement.Code_Morceau=" . $code_morceau[$i]; 
   // echo "<h1> " . $_SESSION['panier'] . "</h1>";
   // unset($_SESSION['panier']);
     //     echo $code_morceau[$i];
   
        foreach ($pdo->query($query) as $row) {
        echo "<tr>";
        if (empty($row['Titre']))
          {
            echo "<td> pas d'album concerne </td>";
          }
          else 
          {
            echo "<td>" . utf8_decode($row['Titre'])."</td>";
          }
          echo "<td>" . $row['Prix'] . " " . "Crédit" . "</td>"; 
          echo "</tr>";
          $som = $som + $row['Prix'];
      }
      
      $pdo = null;}
      echo "<tr>";
      echo "<td> TOTAL </td>";
      echo "<td>" . $som . " " . "Crédit(s)" . "</td>" ;
      echo "</tr>";
      echo 
      "</table>";
      $_SESSION['SOM'] = $som; 
      echo "<div><br><br> <button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-off\"></span><a href=\"vide-panier.php\"> VIDER LE PANIER </a></div>";
      echo "<div><br><br> <button type=\"button\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-off\"></span><a href=\"buy.php\"> VIDER ACHETER TOUS </a></div>";
    }
?>
<div id="signUP">
    <br/>
    <br/>
    <h3> SIGN UP ONLINE </h3>
    <form id="form" method="post" action="signup.php">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom ">
        </div>
        <div class="form-group">
          <label for="prenom">Prenom</label>
          <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prenom ">
        </div> 
         <div class="form-group">
          <label for="login">Nom du compte</label>
          <input type="text" class="form-control" name="login" placeholder="Entrez le nom de votre compte">
        </div>
         <div class="form-group">
          <label for="pwd">Mot de passe</label>
          <input type="password" class="form-control" name="pwd" placeholder="Entrez votre mot de passe">
        </div>
         <div class="form-group">
          <label for="adress">Adress</label>
          <input type="text" class="form-control" name="adress" placeholder="Entrez votre adress">
        </div>
        <div class="form-group">
          <label for="ville">Ville</label>
          <input type="text" class="form-control" name="ville" placeholder="Entrez votre ville">
        </div>
         <div class="form-group">
          <label for="postal">Code Postal</label>
          <input type="text" class="form-control" name="postal" placeholder="Entrez votre code postal">
        </div>
        <div class="form-group">
          <label for="pays">Code Pays</label>
          <input type="text" class="form-control" name="pays" placeholder="Entrez votre code pays">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Entrez votre Email">
        </div>  
        <input id="aa" type="submit" class="btn btn-default" value="Submit"/>
    </form>
  </div>

<div id="foot">
      <h3>Contact with us</h3>
      <table>
      <tr>
        <th><a><img src="icon.gif" alt="#" width=50 height=50/><span> Facebook </span></th>
        <th><a><img src="google.png" alt="#" width=50 height=50/><span> Gmail </span></th>
        <th><a><img src="twitter.png" alt="#" width=50 height=50/><span> Twitter</span></th>
      </tr>
      </table>
</div>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Se connecter</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="validation.php">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="Login" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="Password" placeholder="Enter password">
            </div>
              <button type="submit" class="btn btn-info btn-block"><span class="glyphicon glyphicon-off"></span>Se connnecter</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Quiter</button>
          <p>N'avez pas un compte? <a href="#signUP">Sign Up</a></p>
        </div>
      </div>
      
    </div>
  </div> 
  <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>    
</body>
</html>


