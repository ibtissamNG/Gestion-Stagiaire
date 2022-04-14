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
        <!-- end left sidebar -->
        <!-- ============================================================== -->
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
                            <h3 class="card-header">Stagiaires</h3> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>CIN</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Date de Naissance</th>
                                                <th>Université</th>
                                                <th>Filiére</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Adresse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $data=$_POST['RechercheS'];
                                            $requete1="SELECT distinct s.id_stagiaire, s.cin,s.nom, S.prenom, s.email , s.tel , s.date_naissance ,s.Adresse ,s.Ecole ,s.filiere  FROM stagiaire s where s.cin like '%".$data."%' OR s.nom like '%".$data."%' OR s.prenom like '%".$data."%'";
                                             $resultat1 = mysqli_query($connexion ,$requete1);
                                             while($ligne = mysqli_fetch_object($resultat1))
                                             {
                                                echo '<tr align="center"><td class="class2">'. $ligne->cin.'</td> <td class="class3">'. $ligne->nom.'</td><td class="class2">'. $ligne->prenom.'</td><td class="class2">'. $ligne->date_naissance.'</td>
                                                <td class="class3">'. $ligne->Ecole.'</td> <td class="class3">'. $ligne->filiere.'</td>  <td class="class3">'. $ligne->email.'</td> <td class="class3">'. $ligne->tel.'</td> <td class="class3">'. $ligne->Adresse.'</td>                                          
                                                <td><a onclick="deleteSes('. $ligne->id_stagiaire.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSes('.$ligne->id_stagiaire.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
                                                 <script language="javascript">
                                                        function deleteSes(delid)
                                                        {
                                                          if(confirm("Vous voulez supprimer ce Stagiaire?")){
                                                            window.location.href="supprimerStagiaire.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateSes(upid)
                                                        {
                                                          if(confirm("Vous voulez modifier ce Stagiaire ?")){
                                                            window.location.href="ModifierStagiaire.php?id="+upid+" ";
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
