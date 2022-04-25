<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
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
    <!-- ============================================================== -->
        <?php  include'Menu.php'; ?>
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                
                <div class="card">
                    <h2 class="card-header">Ajouter nouveau projet</h2>
                    <div class="card-body">
                        <form method="POST" action="AjouterProjet.php" >
                             <div class="form-group">
                                <label for="nom" class="col-form-label">Projet</label>
                                <input id="nom"  name="nom" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="statut" class="col-form-label">statut:</label>
                                <select name="typeP" class="form-control">
                                      <option> En cours</option>
                                      <option> interrompu</option>
                                      <option> Terminé</option>
                                </select><br> 
                            </div>

                            

                            <div class="form-group">
                                <label for="respo" class="col-form-label">Responsable:</label>
                                <select name="respo" class="form-control">      
                                <?php 
                                    include ('../Connexion_database.php');

                                    $sql2="SELECT id_respo, nom_respo ,prenom_respo from responsable";
                                    $res2= mysqli_query($connexion,$sql2) ;
                                    while($ligne=mysqli_fetch_array($res2)) {
                                    echo'<option value="'.$ligne['id_respo'].'">'.$ligne["nom_respo"].' '.$ligne["prenom_respo"].'</option> ';}
                            
                            ?>
                                     
                                </select><br> 
                            </div>

                            <div class="form-group">
                                <label for="Service" class="col-form-label">Service:</label>
                                <select name="Service" class="form-control">      
                                <?php 
                                    include ('../Connexion_database.php');

                                    $sql3="SELECT id_service, nom_service  from service";
                                    $res3= mysqli_query($connexion,$sql3) ;
                                    while($ligne=mysqli_fetch_array($res3)) {
                                    echo'<option value="'.$ligne['id_service'].'">'.$ligne["nom_service"].' </option> ';}
                            
                                ?>    
                                </select><br> 
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
                                $typeP=$_POST['typeP'];
                                $intitule=$_POST['nom'];
                                $resp=$_POST['respo'];
                                $service=$_POST['Service'];
                                if ($typeP&& $intitule && $resp && $service)
                                { 
                                   $sql = "INSERT INTO projet(id_projet,nom_projet,statut,id_respo,id_service) values ('','$intitule','$typeP','$resp','$service')";
                                    // On envoie la requête
                                   if($res = $connexion->query($sql))
                                   {
                                      echo "<script>location.href='AfficherProjet.php';</script>";
                                    }
                                }

                                }
                                else if(isset($_POST['annuler'])){
                                    echo "<script>location.href='AfficherProjet.php';</script>";
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