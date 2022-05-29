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
                    <h2 class="card-header">Modifier Projet</h2>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT id_projet , nom_projet , statut, id_respo, id_service FROM projet where id_projet=".$_GET['id']);
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->id_projet;
                                   echo '
                                            <form method="POST" action="ModifierProjet.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="nom" class="col-form-label">Projet</label>
                                                    <input id="nom" name="nom" type="text" value="'.$ligne->nom_projet.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="statut" class="col-form-label">Statut </label>
                                                    <select name="typeP" class="form-control">
                                                        <option> En cours</option>
                                                        <option> Interrompu</option>
                                                        <option> Terminé</option>
                                                    </select><br>
                                                </div>

                                                <div class="form-group">
                                                    <label for="respo" class="col-form-label">Responsable</label>
                                                    <select name="respo" class="form-control">';?>    
                                                    <?php 
                                                            include ('../Connexion_database.php');

                                                            $sql2="SELECT id_respo, nom_respo ,prenom_respo from responsable";
                                                            $res2= mysqli_query($connexion,$sql2) ;
                                                            while($ligne=mysqli_fetch_array($res2)) {
                                                            echo'<option value="'.$ligne['id_respo'].'">'.$ligne["nom_respo"].' '.$ligne["prenom_respo"].'</option> ';}
                                                    
                                                    ?>     
                                                    </select><br> 
                                                </div>
                                            <? php
                                            echo'
                                            <div class="form-group">
                                                <label for="Service" class="col-form-label">Service</label>
                                                <select name="Service" class="form-control"> ';   ?> 
                                                <?php 
                                                    include ('../Connexion_database.php');

                                                    $sql3="SELECT id_service, nom_service  from service";
                                                    $res3= mysqli_query($connexion,$sql3) ;
                                                    while($ligne=mysqli_fetch_array($res3)) {
                                                    echo'<option value="'.$ligne['id_service'].'">'.$ligne["nom_service"].' </option> ';}
                                            
                                                ?>    
                                                </select><br> 
                                            </div>


                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>;
                                            <?php
                                if(isset($_POST['submit']))
                                {
                                  $id=$_GET['id'];
                                  $Projet=$_POST['nom'];
                                  $Statut=$_POST['typeP'];
                                  $Respo=$_POST['respo'];
                                  $Service=$_POST['Service'];
                                 $result = mysqli_query($connexion ,"UPDATE projet SET nom_projet='$Projet', statut='$Statut',id_respo='$Respo' , id_service='$Service'  where id_projet=$id");
                                 { 
                                    echo "<script>location.href='AfficherProjet.php';</script>";
                                 }
                                    
                                } 
                                else if(isset($_POST['annuler']))
                                {
                                   echo "<script>location.href='AfficherProjet.php';</script>";
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
