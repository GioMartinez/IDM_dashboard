<?php
include_once'includes/php/config.php';
include_once'includes/php/memInt.php';
$cache=new Cache($memAddr,$memPort,$memExpi);
$root=$cache->get("root");
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
<title>IDM - Dashboard</title>
<link rel="icon" type="image/png" href="includes/img/SATIcon.png" />
<meta content="text/html" charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="includes/css/bootstrap.min.css" />
<link rel="stylesheet" href="includes/css/main.css" />
</head>
<body>
	<header>
		<div>
			<a class="align-middle" href="http://www.gob.mx/hacienda"><img src="includes/img/SHCPLogo.png" alt="SHCP - "></a>
			<a class="align-middle" href="http://www.sat.gob.mx/Paginas/Inicio.aspx"><img src="includes/img/SATLogo.png" alt="SAT"></a>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row" id="driversContainer">
		<?php foreach($root['children']as$key=>$servers){
			foreach($servers['children']as$key2=>$driversets){
				foreach($driversets['children']as$key3=>$drivers){ ?>
					<div class="col-lg-3 my-2" series="<?php echo $drivers['name']?>">
						<div class="card border-sat">
							<h6 class="card-header bg-sat text-white"><?php echo $drivers['name']?></h6>
							<div class="card-body" id="chart_<?php echo $drivers['name']?>" style="width: 100%; height: 400px;"></div>
						</div>
					</div>
				<?php }
			}
		} ?>
		</div>
	</div>
	<header>
		<div style="height: 20px;">
			<a style="position: absolute; left: 50%; marging-right: -50%; transform: translate(-50%, -50%);" href="https://www.microfocus.com">
				<img style="position: relative; top: 5px; height: 20px;" src="includes/img/mf_logo_blue.png" alt="MicroFocus Inc.">
			</a>
		</div>
	</header>
	<script type="text/javascript" src="includes/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="includes/js/highstock.min.js"></script>
	<script type="text/javascript" src="includes/js/data.min.js"></script>
	<script type="text/javascript" src="includes/js/highcharts-more.min.js"></script>
	<script type="text/javascript" src="includes/js/highcharts.theme.js"></script>
	<script type="text/javascript" src="includes/js/exporting.min.js"></script>
	<script type="text/javascript" src="includes/js/export-csv.js"></script>
	<script type="text/javascript" src="includes/js/main.js"></script>
</body>
</html>