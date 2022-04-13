<?php
ob_start();
?>
<!doctype html>
<html >
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome-all.css"> 
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .logo-img{
        height: 90px;
        width: 95px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><img class="logo-img" src="../img/login.jpg" alt="logo"><span class="splash-description">Veuillez entrer vos informations.</span></div>
            <div class="card-body">
                <form  id="connecter"   class="inputs"  method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="Nom d'utilisateur" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Mot de passe" name="mot_de_passe">
                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Se connecter</button>
                </form>
            
           
             <?php
            include ('../Connexion_database.php');
            if (isset($_POST['submit']))
            {
              $Email=trim($_POST['email']);
              $Pass=trim($_POST['mot_de_passe']);
              $requete2="select email, password from login";
              $resultat2 = mysqli_query($connexion ,$requete2);
              $cpt2=0;
              while($ligne2 = mysqli_fetch_object($resultat2))
              {
                if(($ligne2->email==$Email)&&($ligne2->password==$Pass))
                {
                  $cpt2++;
                }
              }
              if($cpt2==0)
              {
                echo '<p class="R">votre mot de passe ou email est incorrect !</p>';
              }
              if($cpt2!=0)
              {
                session_start();
                $_SESSION['monlogin'] =$Email;
                header('location: ../User/AfficherService.php');
              }
            }
            mysqli_close($connexion);
          ?> 
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->

     <?php
     ob_end_flush();
   ?>
</body>
</html>