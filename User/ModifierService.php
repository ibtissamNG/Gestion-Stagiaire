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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>

<body>
    <?php  include'Menu.php'; ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                
                <div class="card">
                    <h5 class="card-header">Modifier Service</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT id_service , Type_Service , nom_service FROM service where id_service=".$_GET['id']);
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->id_service;
                                   echo '
                                            <form method="POST" action="ModifierService.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="intituleService" class="col-form-label">Service</label>
                                                    <input id="intituleService" name="intituleService" type="text" value="'.$ligne->nom_service.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="typeService" class="col-form-label">Type Service </label>
                                                    <select name="typeService" class="form-control">
                                                          <option> interne</option>
                                                          <option> externe</option>
                                                    </select><br>
                                                   
                                                </div>
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>';
                                            if(isset($_POST['submit']))
                                {
                                  $id=$_GET['id'];
                                  $Service=$_POST['intituleService'];
                                  $typeService=$_POST['typeService'];
                                 $result = mysqli_query($connexion ,"UPDATE service SET nom_service='$Service', Type_Service='$typeService'  where id_service=$id");
                                 { 
                                    echo "<script>location.href='AfficherService.php';</script>";
                                 }
                                    
                                } 
                                else if(isset($_POST['annuler']))
                                {
                                   echo "<script>location.href='AfficherService.php';</script>";
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