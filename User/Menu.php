<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    
</head>

<body>  
    <div class="dashboard-main-wrapper">    
       <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="AfficherStagiaire.php">Gestion des stagiaires</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Admin</h5>
                                </div>
                                <a class="dropdown-item" href="../Anonyme/Deconnexion.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Accueil</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                            <i class="fa fa-home"></i> Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="AfficherStagiaire.php" ><i class="fas fa-user-graduate"></i>Stagiaires <span class="badge badge-success"></span></a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="AfficherRespo.php" ><i class="fas fa-user-tie"></i>Responsables <span class="badge badge-success"></span></a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="AfficherService.php"><i class="fab fa-servicestack"></i>Services</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" ><i class="fas fa-clipboard-list"></i>Projets</a>
                                
                            </li>
                           
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
       <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
              <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <!-- <?php include 'footer.php';?>-->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
      
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    
       </body>
 
</html>







