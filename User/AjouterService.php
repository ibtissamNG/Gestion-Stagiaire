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
                    <h5 class="card-header">Ajouter nouveau service</h5>
                    <div class="card-body">
                        <form method="POST" action="AjouterService.php" >
                        <div class="form-group">
                                <label for="typeService" class="col-form-label">type Service :</label>
                                <select name="typeS" class="form-control">
                                      <option> interne</option>
                                      <option> externe</option>
                                </select><br>
                               
                            </div>
                             <div class="form-group">
                                <label for="intituleService" class="col-form-label">Service</label>
                                <input id="intituleService"  name="nomService" type="text" class="form-control" required>
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
                                $typeS=$_POST['typeS'];
                                $intitule=$_POST['nomService'];
                                if ($typeS&&$intitule)
                                { 
                                   $sql = "INSERT INTO service(id_service,nom_service,Type_Service) values ('','$intitule','$typeS')";
                                    // On envoie la requête
                                   if($res = $connexion->query($sql))
                                   {
                                      echo "<script>location.href='AfficherService.php';</script>";
                                    }
                                }

                                }
                                else if(isset($_POST['annuler'])){
                                    echo "<script>location.href='AfficherService.php';</script>";
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