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
    </style>
</head>

<body> 
   <?php  include'Menu.php'; ?>
        
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Projets</h5> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                    <thead>
                                            <tr>
                                                <th>Projet</th>  
                                                <th>Statut</th>
                                                <th>Responsable</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $prj=$_POST['RecherchePrj'];
                                            $requete1 = "SELECT id_projet , nom_projet,statut ,r.id_respo ,p.id_respo ,nom_respo , prenom_respo FROM projet p ,responsable r WHERE p.id_respo=r.id_respo and nom_projet like '".$prj."%'";
                                             $resultat1 = mysqli_query($connexion ,$requete1);
                                             while($ligne = mysqli_fetch_object($resultat1))
                                             {
                                                echo '<tr align="center"><td class="class2">'. $ligne->nom_projet.'</td><td class="class2">'. $ligne->statut.'</td><td class="class2">'. $ligne->nom_respo.' &nbsp;'.$ligne->prenom_respo.'</td><td><a onclick="deleteProj('. $ligne->id_projet.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateProj('.$ligne->id_projet.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
                                                    <script language="javascript">
                                                        function deleteProj(delid)
                                                        {
                                                          if(confirm("Vous voulez supprimer ce projet?")){
                                                            window.location.href="SupprimerProjet.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateProj(upid)
                                                        {
                                                          if(confirm("Vous voulez modifier ce projet?")){
                                                            window.location.href="ModifierProjet.php?id="+upid+" ";
                                                            return true;
                                                          }
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
