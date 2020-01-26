<?php 
  require_once 'valida-sessao.php';
  require_once '../conexao/FinancaDAO.php';
  $id = $_SESSION["Userid"];


  $financaDAO = new FinancaDAO();
              
  $paginas = $financaDAO->getDespesa();

  # Limita o número de registros a serem mostrados por página
  $limite = 5;

  # Se pg não existe atribui 1 a variável pg
  $pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;

  # Atribui a variável inicio o inicio de onde os registros vão ser
  # mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
  $inicio = ($pg * $limite) - $limite;

  # seleciona os registros do banco de dados pelo inicio e limitando pelo limite da variável limite
  $sql = "SELECT * FROM despesa WHERE usuario_idusuario = $id ORDER BY id_despesa DESC LIMIT ".$inicio. ", ". $limite;
  try{
    $pdo = Conexao::getInstance();
    $despesa = $pdo->prepare($sql);
    $despesa->execute();

    }catch(PDOexception $error_sql){
      echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
  }

  $query_result = $paginas->fetchAll(PDO::FETCH_ASSOC);

  # conta quantos registros tem no banco de dados
  $query_count =  $paginas->rowCount(PDO::FETCH_ASSOC);
  # calcula o total de paginas a serem exibidas
  $qtdPag = ceil($query_count/$limite);
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../vendor/css/home.css" rel="stylesheet">
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
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Histórico de despesas</h1>
          <p class="mb-4">Aqui estão listados todas as despesas .</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Despesas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive pt-3">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Despesa</th>
                      <th>Categoria</th>
                      <th>Valor</th>
                      <th>Status</th>
                      <th>Data da receita</th>
                      <th>Anexo</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Despesa</th>
                      <th>Categoria</th>
                      <th>Valor</th>
                      <th>Status</th>
                      <th>Data da receita</th>
                      <th>Anexo</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php while($despesas = $despesa->fetch(PDO::FETCH_ASSOC)):
                        $date = $despesas['data_vencimento_desp'];
                        $data =  date('d/m/Y', strtotime($date));
                    ?>
                    <tr>
                      <td><?php echo $despesas['nome_desp']; ?></td>
                      <td><?php echo $despesas['tipo_desp']; ?></td>
                      <td><?php echo number_format($despesas['valor_desp'], 2, ',', '.'); ?></td>
                      <td><?php echo $despesas['status_desp'];?></td>
                      <td><?php echo $data; ?></td>
                      <td><?php echo $despesas['doc_desp']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
         
                <!-- Pagination -->
              <div style="float: right;">
                <nav aria-label="Navegação de página exemplo">
                  <ul class="pagination">
                    <?php 
                        echo '<li  class="page-item"><a class="anterior page-link" href="tables-receita.php?pg=1">Anterior</a></li>';
                        if($qtdPag > 1 && $pg <= $qtdPag){

                          for($i = 1; $i <= $qtdPag; $i++){

                            if($i == $pg){

                              echo "<li  class='page-item'><a class='page-link ativo'>".$i."</a></li>";

                            } else {
                              echo "<li  class='page-item'><a class='page-link' href='tables-receita.php?pg=$i'>".$i."</a></li>";
                            }
                          }
                        }
                        echo "<li  class='page-item'><a class='proxima page-link' href='tables-receita.php?pg=$qtdPag'>Próxima</a></li>";
                     ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          
        
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
