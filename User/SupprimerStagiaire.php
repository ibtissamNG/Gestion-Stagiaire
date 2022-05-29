<?php
session_start();
if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login2.php');
include("../Connexion_database.php");
$select = "delete from stagiaire where id_stagiaire='".$_GET['id']."'";
if($query = mysqli_query($connexion,$select))
{
echo '<script>alert(\'Suppression avec succès !)\');</script>';
header('Refresh: 0; url=AfficherStagiaire.php');
}
else
{
echo '<script>alert(\'Une erreur est survenue !! Veuillez ressayer\');</script>';
header('Refresh: 0; url=AfficherStagiaire.php');
}
?>
