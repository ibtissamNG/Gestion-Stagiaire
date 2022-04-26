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
        .table-responsive{display:contents !important;
                            width:100% ;
        }
        thead tr th {
            text-align:center;
        }
    </style>
</head>

<body>
   <?php  include'Menu.php'; ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h2 class="card-header">Stagiaires</h2>
                            <form method="post" action="RechercheStagiaire.php" style="margin:20px 0px -20px 300px">
                                    <input type="text" size="50" name="RechercheS" id="t" placeholder="Rechercher Stagiaire " style="padding: 8px 14px ;border:none; border-radius:20px; background-color:#e7e7ee" >
                                    <button type="submit" id="p" style="border:none;margin-left:-40px; background-color:#e7e7ee;" ><i class="fa fa-search" style="font-size:15px"></i> </button>   
                            </form>
                            <div><a href="AjouterStagiaire.php" id="btn" class="btnAgt"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>CIN</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
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
                                            $resultat1 = mysqli_query($connexion ,"SELECT id_stagiaire , nom , prenom , email , tel , date_naissance ,Adresse ,Ecole ,filiere , cin  FROM stagiaire");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class2">'. $ligne->cin.'</td> <td class="class3">'. $ligne->nom.'</td><td class="class2">'. $ligne->prenom.'</td><td class="class2">'. $ligne->date_naissance.'</td>
                                                <td class="class3">'. $ligne->Ecole.'</td> <td class="class3">'. $ligne->filiere.'</td>  <td class="class3">'. $ligne->email.'</td> <td class="class3">'. $ligne->tel.'</td> <td class="class3">'. $ligne->Adresse.'</td>
                                                <td><a onclick="deleteStag('. $ligne->id_stagiaire.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>
                                                &nbsp&nbsp&nbsp<a onclick="updateStag('.$ligne->id_stagiaire.')"name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
                                                 <script language="javascript">
                                                        function deleteStag(delid)
                                                        {
                                                          if(confirm("Voulez vous supprimer ce stagiaire ?")){
                                                            window.location.href="SupprimerStagiaire.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateStag(upid)
                                                        {
                                                        
                                                            window.location.href="ModifierStagiaire.php?id="+upid+" ";
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