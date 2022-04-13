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
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Listes des responsables</h5>
                            <form method="post" action="RechercheRespo.php">
                                    <input type="text" size="50" name="RechercheNom" id="t" placeholder="Rechercher " >
                                    <button type="submit" id="p"><i class="fa fa-search"></i></button>   
                            </form>
                            <div><a href="AjouterRespo.php" id="btn" class="btnAgt"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>email</th>
                                                <th>Telephone</th>
                                                <th>Modifier</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT  id_respo , nom_respo , prenom_respo , email_respo , Tel_respo FROM responsable");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class2">'. $ligne->nom_respo.'</td> <td class="class3">'. $ligne->prenom_respo.'</td><td class="class4">'. $ligne->email_respo.'</td> <td class="class5">'. $ligne->Tel_respo.'</td> <td><a onclick="deleteRespo('. $ligne->id_respo.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>    &nbsp&nbsp&nbsp    <a onclick="updateRespo('.$ligne->id_respo.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a></td> 
                                                     <script language="javascript">
                                                        function deleteRespo(delid)
                                                        {
                                                          if(confirm("Vous voulez supprimer ce responsable?")){
                                                            window.location.href="SupprimerRespo.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateRespo(upid)
                                                        {
                                                          if(confirm("Vous voulez modifier ce responsable?")){
                                                            window.location.href="ModifierRespo.php?id="+upid+" ";
                                                            return true;
                                                          }
                                                        }                                  
                                                         function AjouterRespo(adid)
                                                        {
                                                              window.location.href="AjouterRespo.php?id="+adid+" ";
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