<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!doctype html>
<html >

 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <?php  include'Menu.php'; ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                
                <div class="card">
                    <h2 class="card-header" >Modifier Stagiaire</h2>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        
                            $result1 = mysqli_query($connexion ,"SELECT id_stagiaire , nom , prenom , email , tel , date_naissance ,Adresse ,Ecole ,filiere , cin FROM stagiaire where id_stagiaire=".$_GET['id']);
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->id_stagiaire;
                                  

                                   echo '
                                            <form method="POST" action="ModifierStagiaire.php?id='.$_GET['id'].'">
                                            <div class="form-group">
                                                 <label for="nom" class="col-form-label">Nom</label>
                                                 <input id="nom" name="nom" type="text" value="'.$ligne->nom.'" class="form-control" Required>
                                             </div>
                                             <div class="form-group">
                                                 <label for="prenom" class="col-form-label">Prénom</label>
                                                 <input id="prenom" name="prenom" type="text" value="'.$ligne->prenom.'" class="form-control" Required>
                                            </div>
                                            <div class="form-group">
                                                 <label for="dateN" class="col-form-label"> Date de Naissance </label>
                                                <input id="dateN" name="dateN" type="date" value="'.$ligne->date_naissance.'" class="form-control" Required>
                                            </div>
                                            <div class="form-group">
                                                 <label for="cin" class="col-form-label"> CIN </label>
                                                 <input id="cin" name="cin" type="text" value="'.$ligne->cin.'" class="form-control" Required>
                                             </div>
                                            <div class="form-group">
                                                 <label for="ecole" class="col-form-label">Université</label>
                                                 <input id="ecole" name="ecole" type="text" value="'.$ligne->Ecole.'" class="form-control" Required>
                                            </div>
                                            <div class="form-group">
                                                 <label for="filiere" class="col-form-label"> Filiére </label>
                                                 <input id="filiere" name="filiere" type="text" value="'.$ligne->filiere.'" class="form-control" Required>
                                            </div>
                                            <div class="form-group">
                                                 <label for="email" class="col-form-label">Email </label>
                                                 <input id="email" name="email" type="text" value="'.$ligne->email.'" class="form-control" Required>
                                            </div>
                                            <div class="form-group">
                                                 <label for="tel" class="col-form-label"> Téléphone </label>
                                                 <input id="tel" name="tel" type="text" value="'.$ligne->tel.'" class="form-control" Required>
                                             </div>
                                            <div class="form-group">
                                                 <label for="adresse" class="col-form-label"> Adresse </label>
                                                 <input id="adresse" name="adresse" type="text" value="'.$ligne->Adresse.'" class="form-control" Required>
                                             </div>
                                            <div style="text-align: center;">
                                                 <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                 <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                            </div>
                                                
                                            </form>';
                                            if(isset($_POST['submit']))
                                {
                                  $id=$_GET['id'];
                                  $nom=$_POST['nom'];
                                  $prenom=$_POST['prenom'];
                                  $email=$_POST['email'];
                                  $tel=$_POST['tel'];
                                  $dateN=$_POST['dateN'];
                                  $filiere=$_POST['filiere'];
                                  $adresse=$_POST['adresse'];
                                  $ecole=$_POST['ecole'];
                                  $cin=$_POST['cin'];
                                  
                                  $result = mysqli_query($connexion ,"UPDATE stagiaire SET nom='$nom', prenom='$prenom', email='$email' ,tel='$tel',date_naissance='$dateN',cin='$cin', filiere='$filiere',adresse='$adresse',ecole='$ecole' where id_stagiaire=$id");
                                 {
                                    echo '<script>alert(\'Modification avec succes.\');</script>';
                                    
                                    echo "<script>location.href='AfficherStagiaire.php';</script>";
                                    
                                 }
                                    
                                } 
                                else if(isset($_POST['annuler']))
                                {
                                   echo "<script>location.href='AfficherStagiaire.php';</script>";
                                }          
                            
                               } 
  
                                
                        ?>
                    </div>
            </div>
        </div>
              <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'footer.php';?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
 
</body>
 
</html>