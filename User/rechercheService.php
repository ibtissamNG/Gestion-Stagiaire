<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!doctype html>
<html>

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    <style>
        img{
            width: 30px;
            height: 30px;
        }
        .table-responsive{display:contents !important;
                            width:100% ;}
    </style>
</head>

<body>
   <?php  include'Menu.php'; ?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Services</h5> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th>Type service</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $intitule=$_POST['RechercheS'];
                                             $requete1="SELECT id_service , Type_service , nom_service FROM service  where nom_service like '%".$intitule."%'";
                                             $resultat1 = mysqli_query($connexion ,$requete1);
                                             while($ligne = mysqli_fetch_object($resultat1))
                                             {
                                            echo '<tr align="center"><td class="class2">'. $ligne->nom_service.'</td> <td class="class3">'. $ligne->Type_service.'</td> <td><a onclick="deleteSes('. $ligne->id_service.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSes('.$ligne->id_service.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
                                            <script language="javascript">
                                            function deleteSer(delid)
                                            {
                                              if(confirm("Vous voulez supprimer ce service?")){
                                                window.location.href="SupprimerService.php?id="+delid+" ";
                                                return true;
                                              }
                                            }   
                                            function updateSer(upid)
                                            {
                                              
                                                window.location.href="ModifierService.php?id="+upid+" ";
                                                return true;
                                              
                                            }   
                                         </script>
                                                     
                                             </tr>';} 
                                
                                             ?>      
                                        </tbody>               
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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