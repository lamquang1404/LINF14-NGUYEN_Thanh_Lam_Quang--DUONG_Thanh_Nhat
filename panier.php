<?php session_start();
  //$_SESSION['panier'] = "";
  
    if (!isset($_SESSION['panier'])){
      $_SESSION['panier'] = $_GET['Code_Morceau'];
    }
    else {
      $val = $_SESSION['panier'];
      $_SESSION['panier'] = $val . "," . $_GET['Code_Morceau'];
    }
   // $url = $_SERVER['REQUEST_URI'];
   header("Location: disque-album.php?Code_Album=" . $_GET['Code_Album']);

?>
    