<?php
$connexion = mysqli_connect("localhost","root","");
  if( !$connexion) 
  { 
   echo "Desolé, connexion à localhost impossible"; 
   exit; 
  }
 if( !mysqli_select_db($connexion,'gestion_stagiaire')) 
 { 
  echo "Désolé, accès à la base gestion_stagiaire impossible";  
  exit;
 }
?>