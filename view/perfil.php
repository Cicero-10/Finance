<?php
  require_once 'valida-sessao.php';
  require_once '../conexao/FinancaDAO.php';

 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Perfil - Finance</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">

  <style>
      /*Sobrescrever css*/
    /*Large devices (desktops, 992px and up)*/
    @media (max-width: 992px) {
        .sidebar{
          width: 30%;
          display: none;

        }
    }
    
     
  </style>

</head>

<body id="page-top">

   <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

 

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Área Administrativa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Serviços
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item" id="">
        <a class="nav-link" href="index.php" id="close-sidebar">
          <i class="fas fa-fw fa-home"></i>
          <span>Início</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables-receita.php" id="close-sidebar">
          <i class="fas fa-fw fa-history"></i>
          <span>Histórico de receitas</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables-despesa.php" id="close-sidebar">
          <i class="fas fa-fw fa-history"></i>
          <span>Histórico de despesas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button class="btn btn-link d-md-none rounded-circle mr-3 sidebarToggleTop" id="close-sidebar" >
            <i class="fa fa-bars"></i>
          </button>

  

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">0+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Central de alertas
                </h6>
           
                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todos os alertas</a>
              </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nome_usu"];echo" "; echo $_SESSION["sobrenome_usu"];?></span>
                <img class="img-profile rounded-circle" src="../vendor/img/<?php echo $_SESSION["picture"] ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="perfil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid pt-5">
          <div align="center">
            <img src="../vendor/img/<?php echo $_SESSION["picture"] ?>" class="mb-5" style="width: 90px; height: 90px; border-radius: 50%; position: absolute; top: 18%; right: 39%; z-index: 1;">

            <form class="col-lg-6 mt-5 mb-5" style="box-shadow: 5px 5px 10px #ccc; padding: 5%;" method="post" action="../controller/UsuarioController.php">
            <div class="row px-lg-5 py-5">
              <div class="col-lg-6  mb-3 nome">
                <input type="text" class="form-control"  value="<?php echo $_SESSION["nome_usu"];?>" disabled>
              </div>
              <div class="col-lg-6 mb-3 sobrenome">
                <input type="text" class="form-control"  value="<?php echo $_SESSION["sobrenome_usu"];?>" disabled>
              </div>
              <div class="col-lg-12 mb-3 email">
                <input type="email" class="form-control" name="email" value="<?php echo $_SESSION["usuario"];?>">
              </div>
              <div class="ml-3 mt-2">
                <button class="btn btn-outline-primary" name="editar_email">Alterar dados</button>
              </div>
              <div class="mt-3 col-lg-12" style="z-index: 1;">
                <?php 
                if (isset($_SESSION['message'])): ?> 
                  <div class="alert alert-<?=$_SESSION['msg_type']?>" data-dismiss="alert" aria-label="Close" >
                    <?php  
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);

                    ?>
                    <span aria-hidden="true" style="float: right; cursor: pointer; ">&times;</span>
                  </div>
                <?php endif; ?>
              </div>
              <div class="ml-3 mt-2">
                <button class="btn btn-outline-warning" name="alterar_senha" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#restpassModal">Alterar senha</button>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delcontModal">Excluir minha conta</button>
              </div>
               
            </div>
          </form> 
         
          </div>
           <!-- /align-center -->    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
          <a class="btn btn-primary" href="../controller/LogoutController.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

<!-- Delete Account  Modal-->
  <div class="modal fade" id="delcontModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir sua conta?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
          <a class="btn btn-primary" href="../controller/LogoutController.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Resete Password  Modal-->
  <div class="modal fade " id="restpassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Redefinir senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="px-5" method="post" action="../controller/UsuarioController.php">
          <div class="rowpy-5">
            <div class="mb-3">
              <input type="password" class="form-control" name="senha" placeholder="Nova senha">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="senha_reset" placeholder="Confirmar senha">
            </div>
            <div class="mb-3">
              <button class="btn btn-success" name="alterar_senha">Salvar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="../vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../vendor/js/sb-admin-2.min.js"></script>
  <script src="../vendor/js/menu.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</body>

</html>
