<?php session_start();?>
<html>
	<head>
		  <title>INTSTRUMENT</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<style>
			li {text-align: center; padding-left: 10px; padding-right: 10px; }
			table {text-align: center;}
			th {text-align: center; color: #5a5a5a; font-size: 25px; padding: 10px;}
			td {padding: 10px; color: blue; }
			#header { background-image: url("instrument1.jpg"); height: 400px;margin-bottom: 50px;}
			#header h2 {color: white; margin-left: 400px; padding: 100px;}
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
			#f {width: 800px; margin-left: 500px; margin-bottom: 40px;}
			#f input {width: 300px;}

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
		<div id="header">
			<h2> TOUS LES INSTRUMENT</h2>
		</div> 
		<form id="f" method="get" action="instrument.php">
	       <input type="text" name="instrument" placeholder="Recherche par nom instrument"><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></input> 
	    </form>
		<?php
			$driver = 'sqlsrv';$host = 'INFO-SIMPLET';$nomDb = 'Classique_Web';
			$user = 'ETD';$password = 'ETD';
			$pdodsn = "$driver:Server=$host;Database=$nomDb";
			// Connexion PDO
			$pdo = new PDO($pdodsn, $user, $password);
			if (isset($_GET['instrument']))
				$query = "select Instrument.Nom_Instrument, Instrument.Code_Instrument
					  FROM Instrument WHERE Instrument.Nom_Instrument LIKE '%" . $_GET['instrument'] . "%'";
			else
				$query = "select Instrument.Nom_Instrument, Instrument.Code_Instrument
					  FROM Instrument";
			echo 
			"<table class=\"table table-bordered\">";
				echo"<tr><th>NOM INSTRUMENT</th><th> PHOTO </th><th> ALBUMS CONCERNENT</th>";
				foreach ($pdo->query($query) as $row) {
					//echo "<form method=\"GET\" action=\"album-compositeur.php\">";
					echo "<tr> <td>" . $row['Nom_Instrument']."</td>";
					echo "<td> <img src=\"image-instrument.php?Code_Instrument=" . $row['Code_Instrument'] . "\" height=\"200\"> </td>";
					echo "<td> <a href=\"album-instrument.php?Code_Instrument=" .$row['Code_Instrument']. "&Nom_Instrument=" . $row['Nom_Instrument'] ."\"> Albums Concernent </a></td>";
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
		    <div id="form">
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
            <input type="text" class="form-control" name="pwd" placeholder="Entrez votre mot de passe">
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
		    </div>
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