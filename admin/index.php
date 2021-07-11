<?php
    require_once __DIR__ . "/autoload/autoload.php";
    if (!isset($_SESSION['user'])) {
        return redirectStyle('index.php');
    }
    if (!empty($_SESSION['user']) && isset($_SESSION['level']) && $_SESSION['level'] == 1 || $_SESSION['level'] == 2) {
        $user = $_SESSION['user'];
    } else {
        return redirectStyle('index.php');
    }
    if ($_SESSION['level'] == 1) {
        $sqlDoanhThu = "SELECT SUM(amount) AS total_money FROM transaction  WHERE status = 2";
    } else {
        $sqlDoanhThu = "SELECT SUM(amount) AS total_money FROM transaction  WHERE status = 2 AND admin_id = ". $user['id'];
    }

    $totalMoney = $db->fetchsql($sqlDoanhThu);

    if ($_SESSION['level'] == 1) {
        $sqlXe = "SELECT SUM(number) AS xe FROM product";
    } else {
        $sqlXe = "SELECT SUM(number) AS xe FROM product WHERE user_id =". $user['id'];
    }
    $totalXe = $db->fetchsql($sqlXe);

    if ($_SESSION['level'] == 1) {
        $sqlChoThue = "SELECT COUNT(id) AS so_luong FROM transaction  WHERE status = 1";
    } else {
        $sqlChoThue = "SELECT COUNT(id) AS so_luong FROM transaction  WHERE status = 1 AND admin_id = ". $user['id'];
    }
    $totalXeChoThue = $db->fetchsql($sqlChoThue);

    $sqlUser = "SELECT COUNT(id) AS total_user FROM users ";
    $totalUser = $db->fetchsql($sqlUser);

    $year = date("Y");
    // Doanh thu theo tháng
    if ($_SESSION['level'] == 1) {
        $sqlMonth1 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 1 AND status = 2";
    } else {
        $sqlMonth1 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 1 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth1 = $db->fetchsql($sqlMonth1);
    if ($_SESSION['level'] == 1) {
        $sqlMonth2 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 2 AND status = 2";
    } else {
        $sqlMonth2 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 2 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth2 = $db->fetchsql($sqlMonth2);

    if ($_SESSION['level'] == 1) {
        $sqlMonth3 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 3 AND status = 2";
    } else {
        $sqlMonth3 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 3 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth3 = $db->fetchsql($sqlMonth3);

    if ($_SESSION['level'] == 1) {
        $sqlMonth4 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 4 AND status = 2";
    } else {
        $sqlMonth4 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 4 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth4 = $db->fetchsql($sqlMonth4);

    if ($_SESSION['level'] == 1) {
        $sqlMonth5 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 5 AND status = 2";
    } else {
        $sqlMonth5 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 5 AND status = 2 AND admin_id=". $user['id'];
    }

    $totalMonth5 = $db->fetchsql($sqlMonth5);

    if ($_SESSION['level'] == 1) {
        $sqlMonth6 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 6 AND status = 2";
    } else {
        $sqlMonth6 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 6 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth6 = $db->fetchsql($sqlMonth6);

    if ($_SESSION['level'] == 1) {
        $sqlMonth7 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 7 AND status = 2";
    } else {
        $sqlMonth7 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 7 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth7 = $db->fetchsql($sqlMonth7);

    if ($_SESSION['level'] == 1) {
        $sqlMonth8 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 8 AND status = 2";
    } else {
        $sqlMonth8 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 8 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth8 = $db->fetchsql($sqlMonth8);

    if ($_SESSION['level'] == 1) {
        $sqlMonth9 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 9 AND status = 2";
    } else {
        $sqlMonth9 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 9 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth9 = $db->fetchsql($sqlMonth9);

    if ($_SESSION['level'] == 1) {
        $sqlMonth10 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 10 AND status = 2";
    } else {
        $sqlMonth10 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 10 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth10 = $db->fetchsql($sqlMonth10);

    if ($_SESSION['level'] == 1) {
        $sqlMonth11 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 11 AND status = 2";
    } else {
        $sqlMonth11 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 11 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth11 = $db->fetchsql($sqlMonth11);

    if ($_SESSION['level'] == 1) {
        $sqlMonth12 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 12 AND status = 2";
    } else {
        $sqlMonth12 = "SELECT SUM(amount) AS total_money FROM transaction  WHERE YEAR(created_at) = ". $year ." AND MONTH(created_at) = 12 AND status = 2 AND admin_id=". $user['id'];
    }
    $totalMonth12 = $db->fetchsql($sqlMonth12);

?>

<?php require_once __DIR__ . "/layouts/header.php"; ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">TRANG QUẢN TRỊ DANH SÁCH XE</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
        <h2>Hoạt động </h2>
            <!--xử lý dữ liệu-->
                <div class="col-md-3" style="padding-left:0px;">
                    <div style="width:100%; height:150px; background:#00c0ef;">
                        <p style="font-size: 18px;text-align: center;padding-top: 20px;color: white;">Doanh thu </p>
                        <p style="text-align: center;font-size: 16px; color: white;"><?php echo formatPrice($totalMoney[0]['total_money']) ?></span> vnđ</span></p>
                    </div>
                </div>
                <div class="col-md-3" style="padding-left:0px;">
                    <div style="width:100%; height:150px; background:#00a65a;">
                        <p style="font-size: 18px;text-align: center;padding-top: 20px;color: white;"> Số xe hiện có </p>
                        <p style="text-align: center;font-size: 16px; color: white;"><?php echo intval($totalXe[0]['xe']) - intval($totalXeChoThue[0]['so_luong']) ?></span> Xe</span></p>
                    </div>
                </div>
                <div class="col-md-3" style="padding-left:0px;">
                    <div style="width:100%; height:150px; background:#f39c12;">
                        <p style="font-size: 18px;text-align: center;padding-top: 20px;color: white;">Số xe đang cho thuê </p>
                        <p style="text-align: center;font-size: 16px; color: white;"><?php echo intval($totalXeChoThue[0]['so_luong']) ?></span> Xe</span></p>
                    </div>
                </div>
                <?php if ($_SESSION['level'] == 1) : ?>
                    <div class="col-md-3" style="padding-left:0px;">
                        <div style="width:100%; height:150px; background:#00c0ef;">
                            <p style="font-size: 18px;text-align: center;padding-top: 20px;color: white;">Số lượng người dùng </p>
                            <p style="text-align: center;font-size: 16px; color: white;"><?php echo intval($totalUser[0]['total_user']) ?></span> Người</span></p>
                        </div>
                    </div>
                <?php endif; ?>
        </div>
    </div>

    <div class="row">
    
        <!-- /.col (LEFT) -->
        <div class="col-md-12">
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Biểu đồ doanh thu theo tháng</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height: 229px; width: 594px;" height="286" width="742"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php require_once __DIR__ . "/layouts/footer.php"; ?>
<script>
  $(function () {
    var areaChartData = {
      labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      datasets: [
        {
          label               : 'Doanh Thu',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
                                    <?= floatval($totalMonth1[0]['total_money']) ?>,
                                    <?= floatval($totalMonth2[0]['total_money']) ?>,
                                    <?= floatval($totalMonth3[0]['total_money']) ?>,
                                    <?= floatval($totalMonth4[0]['total_money']) ?>,
                                    <?= floatval($totalMonth5[0]['total_money']) ?>,
                                    <?= floatval($totalMonth6[0]['total_money']) ?>,
                                    <?= floatval($totalMonth7[0]['total_money']) ?>,
                                    <?= floatval($totalMonth8[0]['total_money']) ?>,
                                    <?= floatval($totalMonth9[0]['total_money']) ?>,
                                    <?= floatval($totalMonth10[0]['total_money']) ?>,
                                    <?= floatval($totalMonth11[0]['total_money']) ?>,
                                    <?= floatval($totalMonth12[0]['total_money']) ?>,
                                ]
        },
      ]
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>