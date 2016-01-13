<html>
<?php
	$Password = $_REQUEST["Password"];
	$Login = $_REQUEST["Login"];
	//$url = $_REQUEST["url"];
	$driver = 'sqlsrv'; $host = 'INFO-SIMPLET';
	$nomDb = 'Classique_Web';
	$user = 'ETD'; $passwordBD = 'ETD';
	$req_txt = "select Login, Password, Nom_Abonné, Code_Abonné from Abonné where Login='$Login' and Password='$Password'";
	$strConnection = "$driver:Server=$host;Database=$nomDb";

	try {
		$arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		$pdo = new PDO($strConnection, $user, $passwordBD,$arrExtraParam);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
		die($msg);
	}

	$req = $pdo->query($req_txt);
	$CONNECTE = false;
	while ($row = $req->fetch()) {
		$CONNECTE=true;
		$Nom_User=$row[utf8_decode('Nom_Abonné')];
		$Code_User=$row[utf8_decode('Code_Abonné')];
	}
	$req->closeCursor();
	$pdo=NULL;
	if($CONNECTE == true) {
		session_start();
		$_SESSION["NOM_USER"] = $Nom_User;
		$_SESSION["CODE_USER"] = $Code_User;
		$_SESSION['expire'] = time()+(0);
		header("Location: pageAccueill.php");
		}
		else { 
			header("Location: pageAccueilPasconnect.php");
		} 
?>
</html>