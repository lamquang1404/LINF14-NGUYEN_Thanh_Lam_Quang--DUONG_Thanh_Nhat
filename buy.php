<?php session_start();?>
<html>
	<head>
		  <title>Genre</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<style>
			li {text-align: center; padding-left: 10px; padding-right: 10px; }
			table {text-align: center;}
			th {text-align: center; color: #5a5a5a; font-size: 30px;}
			td {padding: 20px; color: blue; }
			#header { background-image: url("album.jpg"); height: 400px;margin-bottom: 50px;}
			#header h2 { color: white; margin-left: 450px; padding: 100px;}
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
        <li ><a href="#">Presentation</a></li>
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
			<h2> TOUS LES ALBUMS </h2>
		</div> 
<?php
	//session_start();
		// Paramètres de connexion
		//echo $_SESSION['panier'];
		$code_morceau = explode(",", $_SESSION['panier']);
  		$dem = count($code_morceau);
  		for($i=0;$i<$dem;$i++){
    $driver = 'sqlsrv';$host = 'INFO-SIMPLET';$nomDb = 'Classique_Web';
  $user = 'ETD';$password = 'ETD';
  $pdodsn = "$driver:Server=$host;Database=$nomDb";
  // Connexion PDO
  $pdo = new PDO($pdodsn, $user, $password);
		$query = "INSERT INTO Achat (Code_Enregistrement, Code_Abonné) VALUES('". $code_morceau[$i] ."','". $_SESSION["CODE_USER"] . "')";
				$pdo->query($query);
			$pdo = null;}
			echo 
			"<table class=\"table table-bordered\">";
			echo "<tr> <td> VOUS ÊTES ACHETÉ TOUS </td> </tr> </table>";
			?>

			<?php
			$driver = 'sqlsrv';$host = 'INFO-SIMPLET';$nomDb = 'Classique_Web';
  $user = 'ETD';$password = 'ETD';
  $pdodsn = "$driver:Server=$host;Database=$nomDb";
  // Connexion PDO
  $pdo = new PDO($pdodsn, $user, $password);
  $query = "select Abonné.Credit FROM Abonné WHERE Abonné.Code_Abonné = " . $_SESSION["CODE_USER"];
  foreach ($pdo->query($query) as $row) {
  	$result = $row['Credit'] - $_SESSION[SOM];
  }
  $pdo = null;
			?>

			<?php
			$driver = 'sqlsrv';$host = 'INFO-SIMPLET';$nomDb = 'Classique_Web';
  $user = 'ETD';$password = 'ETD';
  $pdodsn = "$driver:Server=$host;Database=$nomDb";
  // Connexion PDO
  $pdo = new PDO($pdodsn, $user, $password);
  $query = "UPDATE Abonné SET Credit = " . $result . "WHERE Code_Abonné = " . $_SESSION["CODE_USER"];
  $pdo->query($query);
			$pdo = null;
?>
			<?php
				unset($_SESSION['panier']);
				sleep(3);
				header("Location: profil.php");
				exit;
		?>