@extends('layouts.admin')

@section('content')

<?php
$current_month = date('M');
$last_month = date('M',strtotime("-1 Month"));
$last_to_last_month = date('M',strtotime("-2 Month")); 

$dataPoints = array(
	array("y" => $current_month_users, "label" => $current_month),
	array("y" => $last_month_users, "label" => $last_month),
	array("y" => $last_to_last_month_users, "label" => $last_to_last_month),
);

?>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('Admin') }}</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$order}}</h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$products}}<sup style="font-size: 20px"></sup></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="products" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$customer}}</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="customers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <div class="card">
            <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
            </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <div class="card">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </section>
       
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    
    </div><!-- /.container-fluid -->
    
  </section>
  <!-- /.content -->
  <script>
  window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
   title: {
     text: "Users Reporting"
   },
   axisY: {
     title: "Number of Users"
   },
   data: [{
     type: "line",
     dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });
  chart.render();

// BAR CHART
var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Orders"
	},
	axisY: {
		title: "Number Of Orders"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Last 3 Months",
		dataPoints: [      
			{ y: <?php echo $current_month_orders; ?>, label: "<?php echo $current_month ?>" },
			{ y: <?php echo $last_month_orders ?>,  label: "<?php echo $last_month ?>" },
			{ y: <?php echo $month_orders ?>,  label: "<?php echo $last_to_last_month ?>" },

		]
	}]
});
chart.render();
  
 } 
  </script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  
@endsection
