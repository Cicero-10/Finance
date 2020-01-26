<?php
  require_once 'valida-sessao.php';
  require_once '../conexao/FinancaDAO.php';
  setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Finance - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- Custom styles for this template-->
  <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../vendor/css/home.css" rel="stylesheet">

<style type="text/css">
  .sidebarToggleTop{
    cursor: pointer!important;
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
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4" >
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="display: none!important;"><i class="fas fa-download fa-sm text-white-50"></i> Gerar relatório</a>
             
          </div>

          <!-- Content Row -->
          <div class="row">
            <?php 

              $financaDAO = new FinancaDAO();
              
              if($usuarios = $financaDAO->getReceitaUserID()):

                foreach ($usuarios as $usuario):
                $_SESSION["receita"] = $usuario['sum(valor_rec)'];

             ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Receitas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($usuario['sum(valor_rec)'], 2, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;  endif;?>
            <?php 
              if($despesas = $financaDAO->getDespesaUserID()):

                foreach ($despesas as $despesa):

                $_SESSION["despesa"] = $despesa['sum(valor_desp)'];
             ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Despesas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($despesa['sum(valor_desp)'], 2, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

            <?php 
             ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saldo Atual</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <?php 
                              $receita = $_SESSION["receita"];
                              $despesa = $_SESSION["despesa"];
                              $saldo = $receita - $despesa;
                              echo number_format($saldo, 2, ',', '.');
                            ?>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Solicitações Pendentes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bell fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php else: ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Receitas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0,00</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Despesas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0,00</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saldo Atual</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0,00</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Solicitações Pendentes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bell fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php endif; ?>

          </div>

          <!-- Content Row -->

          <div class="row mt-5">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7 ">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Receitas de <?php $mes =  date("Y"); $data =  strftime(' %Y', strtotime($mes)); echo $data; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Despesas de <?php $mes =  date("Y-m-d"); $data =  strftime('%B de %Y', strtotime($mes)); echo $data; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <div id="donut_single" style="width: 100%; height: 500px; margin-top: -20vh;"></div>
                  </div>
                  <div class="mt-4 text-center small py-2">
                  </div>
                </div>
              </div>
            </div>
          </div>

         

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

  <div style="position: fixed; bottom: 12%; right:1%!important; background-color: #1cc88a; color: #fff; padding: 15px; width: 55px; height: 55px; border-radius: 50%; box-shadow: 5px 5px 20px #bbb"  class="plus">
   <span data-feather="plus"></span>
   <div class="list">
      <ul>
        <li style="background-color: #23c546; padding: 15px; width: 55px; height: 55px; border-radius: 50%;"><span style=" color: #fff!important;"> <span data-feather="trending-up" data-toggle="modal" data-target="#modalReceita"></span></span> <div class="info">Criar receita</div></li>
        <li style="background-color: #e30808; padding: 15px; width: 55px; height: 55px; border-radius: 50%;"><span data-feather="trending-down" data-toggle="modal" data-target="#modalDespesa"></span><div class="info2">Criar despesa</div></li>
      </ul>
   </div>
  </div>

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

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Page level custom scripts -->

         <!-- Ícones -->
    <script src="https://use.fontawesome.com/354501cf3b.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Categoria', 'Valor'],
          <?php
          $financaDAO = new FinancaDAO();

          $despesas = $financaDAO->getDespesaMes(); 
          foreach ($despesas as $despesa){
          echo"['".$despesa['nome_desp'].'('.$despesa['categoria_desp'].')'."', ".$despesa['valor_desp']."],";
        }
          ?>
        ]);

        var options = {
          pieHole: 0.7,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }
</script>
<?php 
    $id = $_SESSION["Userid"];
    $pdo = Conexao::getInstance();

    $sql = "SELECT * FROM receita WHERE  usuario_idusuario = $id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $json = [];
    $json2 = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $mes = $data_rec;
      setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      date_default_timezone_set('America/Sao_Paulo');
      $data =  strftime('%h', strtotime($mes));
      $json[] = $data;
      $json2[] = (int)$valor_rec;

      
    }

 ?>
<script type="text/javascript">
  
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}


// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($json); ?>,
    datasets: [{
      label: "Receita",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($json2); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'R$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': R$' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>
 <!-- modals -->

<!-- Modal Receita-->
<div class="modal fade" id="modalReceita" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nova receita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../controller/FinancaController.php" enctype="multipart/form-data" class="px-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fas fa-calculator" style="float: left; margin-top: 17%; position: absolute; margin-left: -10px;"></i>
                            <label>Insira o valor</label>
                            <input type="text" class="form-control" name="valor_rec" placeholder="R$0,00">
                        </div>
                        <div class="col-lg-6">
                            <i class="fas fa-calendar" style="float: left; margin-top: 17%; position: absolute; margin-left: -10px;"></i>
                            <label>Data</label>
                            <input type="date" class="form-control" name="data_rec" id="data" value='<?php echo date("Y-m-d"); ?>'>
                        </div>
                    </div>
                    <!-- fim row -->
                    <div class="row mt-3">
                        <div class="col-lg-8 ">
                           <i class="far fa-comment-alt" style="float: left; margin-top: 5%; position: absolute; margin-left: -10px;"></i>
                            <input type="text" class="form-control" placeholder="Descrição" name="nome_rec">

                        </div>
                        <div class="col-lg-4 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" name="status_rec" value="Recebido">
                                <label class="form-check-label" for="gridCheck">
                                    Já recebeu?
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- fim row -->
                    <div class="row mt-3">
                        <div class="col-lg-6">
                          <i class="fas fa-bookmark" style="float: left; margin-top: 15%; position: absolute; margin-left: -7px;"></i>
                            <label>Categoia</label>
                            <select class="form-control" name="tipo_rec">
                                <option value="Salario">Salário</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="mb-4">Anexar Documento</label><br>
                            <label class="input-hidden" id="doc"></label>
                            <input type="file" class="form-control " name="doc_rec" id="myfile">
                        </div>

                    </div>
                    <!-- fim row -->
                    <div class="row mt-3">
                        <div class="">
                            <button class="btn btn-custom" name="salvarRec">Salvar</button>
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

<!-- Modal Despesa-->
<div class="modal fade" id="modalDespesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nova despesa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../controller/FinancaController.php" enctype="multipart/form-data" class="px-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <i class="fas fa-calculator" style="float: left; margin-top: 17%; position: absolute; margin-left: -10px;"></i>
                            <label>Insira o valor</label>
                            <input type="text" class="form-control" name="valor_desp" placeholder="R$0,00">
                        </div>
                        <div class="col-lg-6">
                            <i class="fas fa-calendar" style="float: left; margin-top: 17%; position: absolute; margin-left: -10px;"></i>
                            <label>Data de vencimento</label>
                            <input type="date" class="form-control" name="vencimento_desp" id="data" value='<?php echo date("Y-m-d"); ?>'>
                        </div>
                    </div>
                    <!-- fim row -->
                    <div class="row mt-3">
                        <div class="col-lg-8 ">
                           <i class="far fa-comment-alt" style="float: left; margin-top: 5%; position: absolute; margin-left: -10px;"></i>
                            <input type="text" class="form-control" placeholder="Descrição" name="nome_desp">

                        </div>
                        <div class="col-lg-4 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" name="status_desp" value="Pago">
                                <label class="form-check-label" for="gridCheck">
                                    Já pagou?
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- fim row -->
                    <div class="row mt-3">
                        <div class="col-lg-6">
                          <i class="fas fa-bookmark" style="float: left; margin-top: 15%; position: absolute; margin-left: -7px;"></i>
                            <label>Categoia</label>
                            <select class="form-control" name="categoria_desp">
                                <option value="Casa">Casa</option>
                                <option value="Carro">Carro</option>
                                <option value="Agua">Água</option>
                                <option value="Energia">Energia</option>
                                <option value="Internet">Internet</option>
                                <option value="Cartao C.">Cartão de crádito</option>
                                <option value="Alimentacao">Alimentação</option>
                                <option value="Lazer">Lazer</option>
                                <option value="Educacao">Educação</option>
                                <option value="Roupa">Roupa</option>
                                <option value="Saude">Saude</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="mb-4">Anexar Documento</label><br>
                            <label class="input-hidden" id="doc"></label>
                            <input type="file" class="form-control " name="doc_desp" id="myfile">
                        </div>

                    </div>
                    <!-- fim row -->
                      <!-- fim row -->
                      <div class="row mt-3">
                          <div class="col-lg-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck" name="tipo_desp" value="Despesa Fixa">
                                  <label class="form-check-label" for="gridCheck">
                                      Despesa Fixa
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck" name="tipo_desp" value="Despesa Extra">
                                  <label class="form-check-label" for="gridCheck">
                                      Despesa Extra
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-check">
                                  <input class="form-check-input check" type="checkbox" id="check" name="tipo_desp" value="Despesa Financiada">
                                  <label class="form-check-label" for="gridCheck">
                                     Despesa Financiada
                                  </label>
                              </div>
                          </div>
                          <div class="row col-lg-12 opcao">
                              <div class="col-lg-6 mt-3" id="opcao">
                                  <label>N. de parcelas</label>
                                  <input type="text" class="form-control input" name="qtd_parc_desp">
                              </div>
                              <div class="col-lg-6 mt-3" id="opcao2">
                                  <label>N. de parcelas pagas</label>
                                  <input type="text" class="form-control input" name="qtd_parc_pg_desp" id="inline">
                              </div>
                          </div>
                      </div>
                      <!-- fim row -->
                    <div class="row mt-3">
                        <div class="">
                            <button class="btn btn-custom" name="salvarDesp">Salvar</button>
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


  <script>
    $('#doc').click(function(){
      $('#myfile').click()
    });

    $('#prev-data').click(function(){
          $('#data').click()
    });

      $('.check').click(function() {
        $('#opcao').toggle(500);
        $('#opcao2').toggle(500);
   });

    $(".sidebarToggleTop").click(function(){
          $(".sidebar").show();
        });
        $("#close-sidebar").click(function(){
          $(".sidebar").hide();
        });
  </script>
</body>

</html>
