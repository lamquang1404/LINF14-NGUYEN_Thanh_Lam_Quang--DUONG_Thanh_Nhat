<?php
		// Paramètres de connexion
		$driver = 'sqlsrv';
		$host = 'INFO-SIMPLET';
		$nomDb = 'Classique_Web';
		$user = 'ETD'; $password = 'ETD';
		// Chaine de connexion
		$pdodsn = "$driver:Server=$host; Database=$nomDb";
		// Connexion PDO
		$pdo = new PDO($pdodsn, $user, $password);

		$query1 = "select Login from Abonné where Login='" . $_POST['login'] . "'";
		if ($pdo->query($query1)->fetchColumn() != "")
		{
			echo (utf8_decode(" Le nom de compte a été déjà utilisé! ");
			echo "<a href=\"pageAccueill.php\"><button type=\"submit\">Back</button></a>";
		}
		else
			{
				echo "<h3> Ajouter succes</h3>";
				echo "<a href=\"pageAccueill.php\"><button type=\"submit\">Back</button></a>";
				$query = "INSERT INTO Abonné (Nom_Abonné, Prénom_Abonné, Login, Password, Adresse,Ville,Code_Postal,Code_Pays,Email) VALUES('". $_POST['nom'] ."','". $_POST['prenom'] ."','". $_POST['login'] ."','". $_POST['pwd'] . "','" .$_POST['adress']. "','". $_POST['ville']. "','". $_POST['postal'].
					"','" . $_POST['pays'] . "','" . $_POST['email'] . "')";
				$pdo->query($query); 
			}
		$pdo = null;

		?>