<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PageAccueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner {
  		background-color: black;
  	}
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 85%;
      margin: auto;
  }
  li {text-align: center; padding-left: 10px; padding-right: 10px; }
  #inteprete, #cd, #compositeur, #panier {width: 1100px; clear: both; margin-top: 60px; height: 400px;}
  #cd img {float: left; border-radius: 25px;  margin-left: 100px;}
  #inteprete img {float: left; border-radius: 50%;}
  #compositeur img{float: right; border-radius: 25%;}
  #panier img {float: right; margin-right: 100px;}
  #cd #para p{float: right; width: 500px; padding:50px; color: #5a5a5a; font-size: 20px;}
  #inteprete #para p {float: left; width: 500px; padding:100px; color: #5a5a5a; font-size: 20px;}
  #compositeur #para p{float: left; width: 500px; padding:50px; color: #5a5a5a; font-size: 20px;}
  #panier #para p {float: left; width: 500px; padding:50px; color:#5a5a5a; font-size: 20px; margin-left: 100px;}
  #inteprete #para button, #compositeur #para button {margin-left: 120px;}
  #panier #para button {margin-left: 200px;}
  #cd #para button {margin-left: 250px;}
  #foot{
  width: 100%;
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
  width: 100%;
  margin-top: 30px;
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
<div id="header">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
	      <div class="item active">
	        <img src="a1.jpg" alt="Chania" width="460" height="345">
	      </div>

	      <div class="item">
	        <img src="a2.jpg" alt="Chania" width="460" height="345">
	      </div>
	    
	      <div class="item">
	        <img src="a5.jpg" alt="Flower" width="460" height="345">
	      </div>
    </div>
  </div>
</div>
<div class="container">
  <div id="cd">
    <img src="cd.jpg" alt="#" width="400" height="400"/>
    <div id="para">
      <p>Tous les albums de la musique classique pour tous les gouts. Une facon de relaxer et d' aider à refléchir. L'art est un "dream-maker" </p>
      <a href="lesAlbums.php"><button type="button" class="btn btn-primary">Cliquez pour les Albums</button></a>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div id="compositeur">
    <img src="compo.jpeg" alt="#"/> 
    <div id="para">
      <p>"La musique est la révélation la plus haute que toute sagesse et la philosophie." - Ludwig van Beethoven
          <br>
        Vous pouvez choisir votre compositeur adoré avec un seul clique. 
      </p>
      <a href="compositeur.php"><button type="button" class="btn btn-primary">Cliquez pour les compositeurs</button></a>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div id="inteprete">
    <img src="intepret.jpg" alt="#"/>
    <div id="para"> 
      <p> A coté des compositeurs, chaque inteprete laisse une trace differente sur un oeuvre de musique
        <br> 
        Un clique pour voir tous les intepretes celebres.
      </p>
      <a href="inteprete.php"><button type="button" class="btn btn-primary">Cliquez pour les interprètes</button></a>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div id="panier">
    <img src="panier.png" alt="#" width="300" height="300"/>
    <div id="para">
      <p>Consulter tous les albums dans votre panier. Un outil professionnel qui facilite au maximun votre achat.
          <br>
          Tout dans un seul clique. (connexion nécessite)
      </p>
      <?php
        if (empty($_SESSION["NOM_USER"]))
          echo "<button type=\"button\" class=\"btn btn-primary\">Cliquez pour voir votre panier</button>";
        else 
          echo "<a href=\"cart.php\"><button type=\"button\" class=\"btn btn-primary\">Cliquez pour voir votre panier</button></a>";
        ?>
    </div>
  </div>
</div>
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