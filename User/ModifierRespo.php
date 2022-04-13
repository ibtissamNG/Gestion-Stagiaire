<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!doctype html>
<html >
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
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
                    <h5 class="card-header">Modifier responsable</h5>
                    <div class="card-body">
                        <?php 
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT id_respo , nom_respo , prenom_respo , email_respo , Tel_respo FROM responsable where id_respo=".$_GET['id']);
                               $ligne = mysqli_fetch_object($result1);
                               
                                  $ID=$ligne->id_respo;
                                  

                                   echo '
                                            <form method="POST" action="ModifierRespo.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="nom_respo" class="col-form-label">Nom</label>
                                                    <input id="nom_respo" name="nom_respo" type="text" value="'.$ligne->nom_respo.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prenom_respo" class="col-form-label">Prenom</label>
                                                    <input id="prenom_respo" name="prenom_respo" type="text" value="'.$ligne->prenom_respo.'" class="form-control" Required>
                                                </div>
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>';
                                            if(isset($_POST['submit']))
                                {
                                  $id=$_GET['id'];
                                  $Nom=$_POST['nom_respo'];
                                  $Prenom=$_POST['prenom_respo'];
                                 $result = mysqli_query($connexion ,"UPDATE responsable SET nom_respo='$Nom', prenom_respo='$Prenom'  where id_respo=$id");
                                 {
                                    echo '<script>alert(\'Modification avec succes.....\');</script>';
                                    
                                    echo "<script>location.href='AfficherRespo.php';</script>";
                                    
                                 }
                                    
                                } 
                                else if(isset($_POST['annuler']))
                                {
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