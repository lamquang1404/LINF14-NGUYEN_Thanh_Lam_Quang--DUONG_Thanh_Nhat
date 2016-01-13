<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Albums Concernent</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    #header { background-image: url("disque.jpg"); height: 400px;margin-bottom: 50px;}
    #header h2 { color: white; margin:auto; padding: 100px;}
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
    margin-top: 40px;
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
  <?php
    echo "<center><h2>Album de l'orchestre" . " " . $_GET['Nom_Orchestre'] .  "</h2></center>";
    ?>
</div>
<?php
      $driver = 'sqlsrv';$host = 'INFO-SIMPLET';$nomDb = 'Classique_Web';
      $user = 'ETD';$password = 'ETD';
      $pdodsn = "$driver:Server=$host;Database=$nomDb";
      // Connexion PDO
      $pdo = new PDO($pdodsn, $user, $password);
       $query = " select DISTINCT Album.Titre_Album, Album.Année_Album, Album.Code_Album
                FROM Album INNER JOIN
                       (Disque inner join 
                       (Composition_Disque INNER JOIN 
                       (Enregistrement INNER JOIN 
                       (Direction INNER JOIN Orchestres ON Direction.Code_Orchestre = Orchestres.Code_Orchestre)
                      ON Enregistrement.Code_Morceau = Direction.Code_Morceau)
                      ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau)
                      ON Disque.Code_Disque = Composition_Disque.Code_Disque)
                      ON Album.Code_Album = Disque.Code_Album
                WHERE Orchestres.Code_Orchestre = " . $_GET['Code_Orchestre'];
      echo 
      "<table class=\"table table-bordered\">";
        echo"<tr><th>TITRE ALBUM</th><th>ANNEE</th><th>IMAGE</th></tr>";
        foreach ($pdo->query($query) as $row) {
          echo "<tr>";
          if (empty($row['Titre_Album']))
          {
            echo "<td> pas d'album concerne </td>";
          }
          else 
          {
            echo "<td> <a href=\"disque-album.php?Code_Album=" . $row['Code_Album'] . "\" >" . $row['Titre_Album']."</td>";
            //echo "<td>" . $row['Titre_Album']."</td>";
          }
          if (empty($row[utf8_decode('Année_Album')]))
          {
            echo "<td> pas d'album concerne </td>";
          }
          else 
          {
            echo "<td>".$row[utf8_decode('Année_Album')]."</td>";
          }
          echo "<td><img src=\"image-album.php?Code_Album=" . $row['Code_Album'] . "\" height=\"100\"></td>";
          echo "</tr>";
          

        }
      echo 
      "</table>";
      $pdo = null;
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
        <td><a><img src="icon.gif" alt="#" width=50 height=50/><span> Facebook </span></td>
        <td><a><img src="google.png" alt="#" width=50 height=50/><span> Gmail </span></td>
        <td><a><img src="twitter.png" alt="#" width=50 height=50/><span> Twitter</span></td>
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