<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Something Wrong</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  p { margin-left:70px; color: gray; font-size: 30px;}
  #header { background-image: url("album.jpg"); height: 400px;margin-bottom: 50px;}
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

  #foot table tr td {
    width: 200px;
    cursor: pointer;  
  }

  #foot table tr td a{
    text-decoration: none;
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="lesAlbums.php">Albums</a></li>
        <li class="dropdown">
        	<a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown" area-expanded="false">Rechercher par<span class="caret"></span></a>
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
        <li><a href="presentation.php">Presentation</a></li>
      </ul>
    </div>
	</nav>
  <div id="header">
  </div> 
  <div>
    <p>VOTRE USERNAME OU MOT DE PASSE N'EST PAS CORRECT!!! REDONNEZ LES INFORMATION!</p>
    <form role="form" method="post" action="validation.php" style="padding:40px 50px;">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="Login" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="Password" placeholder="Enter password">
            </div>
              <button type="submit" class="btn btn-info btn-block"><span class="glyphicon glyphicon-off"></span>Se connnecter</button>
               <p>N'avez pas un compte? <a href="#signUP">Sign Up</a></p>
    </form>
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
        <td><a><img src="icon.gif" alt="#" width=50 height=50/><span> Facebook </span></td>
        <td><a><img src="google.png" alt="#" width=50 height=50/><span> Gmail </span></td>
        <td><a><img src="twitter.png" alt="#" width=50 height=50/><span> Twitter</span></td>
      </tr>
      </table>
	</div>
</body>
</html>
