<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login2.php');
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
        <?php  include'Menu.php'; ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                
                <div class="card">
                    <h5 class="card-header">Ajouter responsable</h5>
                    <div class="card-body">
                        <form method="POST" action="AjouterRespo.php" >
                            <div class="form-group">
                                <label for="nom_respo" class="col-form-label">Nom</label>
                                <input id="nom_respo"  name="nom_respo" type="text"  placeholder="Nom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom_respo" class="col-form-label">Prenom</label>
                                <input id="prenom_respo"  name="prenom_respo" type="text" placeholder="Prenom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email_respo" class="col-form-label">Email</label>
                                <input id="email_respo"  name="email_respo" type="text" placeholder="Email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Tel_respo" class="col-form-label">Telephone</label>
                                <input id="Tel_respo"  name="Tel_respo" type="text" placeholder="Telephone" class="form-control" required>
                            </div>
                                
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
                                    $Nom=$_POST['nom_respo'];
                                    $Prenom=$_POST['prenom_respo'];
                                    $Email=$_POST['email_respo'];
                                    $Tel=$_POST['Tel_respo'];
                                    if($Nom&&$Prenom&&$Email&&$Tel)
                                    { 
                                       $sql = "INSERT INTO responsable(id_respo,nom_respo,prenom_respo,email_respo,Tel_respo) values ('','$Nom','$Prenom','$Email','$Tel')";
                                        // On envoie la requête
                                       $result = mysqli_query($connexion ,"INSERT INTO responsable(id_respo,nom_respo,prenom_respo,email_respo,Tel_respo) values ('','$Nom','$Prenom','$Email','$Tel')");
                                       {
                                          echo '<script>alert(\'Responsable bien ajouté.\');</script>';
                                          echo "<script>location.href='AfficherRespo.php';</script>";
                                        }
                                    }
                                }
                                else if(isset($_POST['annuler'])){
                                    echo "<script>location.href='AfficherRespo.php';</script>";
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