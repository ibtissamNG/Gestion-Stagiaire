<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login2.php');
?>
<!doctype html>
<html lang="en">

 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-select.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    <style>
        .selectpicker{
            width: 900px;
           
        }
    </style>
</head>

<body>
        <?php  include'Menu.php'; ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">               
                <div class="card">
                    <h2 class="card-header">Ajouter Stagiaire</h2>
                    <div class="card-body">
                        <form method="POST" action="AjouterStagiaire.php" >         
                        <div class="form-group">
                            <label for="nom" class="col-form-label">Nom</label>
                            <input id="nom" name="nom" type="text"  class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="col-form-label">Prénom</label>
                            <input id="prenom" name="prenom" type="text"  class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="dateN" class="col-form-label"> Date de Naissance </label>
                            <input id="dateN" name="dateN" type="date"  class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="cin" class="col-form-label"> CIN </label>
                            <input id="cin" name="cin" type="text"  class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="ecole" class="col-form-label">Université</label>
                            <input id="ecole" name="ecole" type="text"  class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="filiere" class="col-form-label"> Filiére </label>
                            <input id="filiere" name="filiere" type="text"  class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email </label>
                            <input id="email" name="email" type="text" class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label"> Telephone </label>
                            <input id="tel" name="tel" type="text"  class="form-control" Required>
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="col-form-label"> Adresse </label>
                            <input id="adresse" name="adresse" type="text" class="form-control" Required>
                        </div>
        
                        <div style="text-align: center;">
                            <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                            <button class="btn btn-outline-danger" name="annuler">Annuler</button>
                            
                        </div>
                            
                            </form>
                            <?php
                                include ('../Connexion_database.php');
                                if(isset($_POST['submit']))
                                {
                                $nom=$_POST['nom'];
                                $prenom=$_POST['prenom'];
                                $email=$_POST['email'];
                                $tel=$_POST['tel'];
                                $dateN=$_POST['dateN'];
                                $filiere=$_POST['filiere'];
                                $adresse=$_POST['adresse'];
                                $ecole=$_POST['ecole'];
                                $cin=$_POST['cin'];
                                
                                if ($nom&&$prenom&&$email&&$tel&&$dateN&&$filiere&&$adresse&&$ecole&&$cin)
                                { 
                                   $sql = "INSERT INTO stagiaire(id_stagiaire,nom,prenom,email,tel,date_naissance,Adresse,Ecole,filiere,cin) values ('','$nom','$prenom','$email','$tel','$dateN','$adresse','$ecole','$filiere','$cin')";
                                    // On envoie la requête
                                   if($res = $connexion->query($sql))
                                   {
                                      echo '<script>alert(\'Ajout avec succes .\');</script>';
                                      echo "<script>location.href='AfficherStagiaire.php';</script>";
                                    }
                                }

                                }
                                else if(isset($_POST['annuler'])){
                                    echo "<script>location.href='AfficherStagiaire.php';</script>";
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
