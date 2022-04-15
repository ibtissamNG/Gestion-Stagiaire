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
                            <form method="post" action="rechercheService.php" style="margin:20px 0px -20px 300px">
                                    <input type="text" size="50" name="RechercheS" id="t" placeholder="Rechercher Service " style="padding: 8px 14px ;border:none; border-radius:20px; background-color:#e7e7ee" >
                                    <button type="submit" id="p" style="border:none;margin-left:-40px; background-color:#e7e7ee;" ><i class="fa fa-search" style="font-size:15px"></i> </button>   
                            </form>
                            <div><a href="AjouterService.php" id="btn" class="btnAgt"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th>Type Service</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT id_service , nom_service, Type_Service FROM service");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class2">'. $ligne->nom_service.'</td><td class="class2">'. $ligne->Type_Service.'</td><td><a onclick="deleteSer('. $ligne->id_service.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSer('.$ligne->id_service.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
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