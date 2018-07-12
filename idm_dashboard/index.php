<?php
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
		<div class="row">
			<div class="col-lg my-2" style="display:none;">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">Aplicativos</h6>
					<div class="card-body">
						<table id="table-sparkline" style="width: 100%;">
							<thead>
								<tr>
									<th>Aplicativo</th>
									<th></th>
									<th>Sincronizacion</th>
									<th></th>
									<th>Tiempo</th>
								</tr>
							</thead>
							<tbody id="tbody-sparkline">
								<tr>
									<th>Aplicativo 01</th>
									<td>254</td>
									<td data-sparkline="71, 78, 39, 66 " />
									<td>296</td>
									<td data-sparkline="68, 52, 80, 96 " />
								</tr>
								<tr>
									<th>Aplicativo 02</th>
									<td>246</td>
									<td data-sparkline="87, 44, 74, 41 " />
									<td>181</td>
									<td data-sparkline="29, 54, 73, 25 " />
								</tr>
								<tr>
									<th>Aplicativo 03</th>
									<td>101</td>
									<td data-sparkline="56, 12, 8, 25 " />
									<td>191</td>
									<td data-sparkline="69, 14, 53, 55 " />
								</tr>
								<tr>
									<th>Aplicativo 04</th>
									<td>303</td>
									<td data-sparkline="81, 50, 78, 94 " />
									<td>76</td>
									<td data-sparkline="36, 15, 14, 11 " />
								</tr>
								<tr>
									<th>Aplicativo 05</th>
									<td>200</td>
									<td data-sparkline="61, 80, 10, 49 " />
									<td>217</td>
									<td data-sparkline="100, 8, 52, 57 " />
								</tr>
								<tr>
									<th>Aplicativo 06</th>
									<td>118</td>
									<td data-sparkline="13, 48, 21, 36 " />
									<td>273</td>
									<td data-sparkline="98, 86, 8, 81 " />
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg my-2">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">Servidores</h6>
					<div class="card-body">
						<table id="table-sparkline" style="width: 100%;">
							<thead>
								<tr>
									<th>Equipo</th>
									<th></th>
									<th>RAM</th>
									<th></th>
									<th>CPU</th>
								</tr>
							</thead>
							<tbody id="tbody-sparkline">
								<tr>
									<th>tqidnpro01</th>
									<td>254</td>
									<td data-sparkline="71, 78, 39, 66 " />
									<td>296</td>
									<td data-sparkline="68, 52, 80, 96 " />
								</tr>
								<tr>
									<th>tqidnpro02</th>
									<td>246</td>
									<td data-sparkline="87, 44, 74, 41 " />
									<td>181</td>
									<td data-sparkline="29, 54, 73, 25 " />
								</tr>
								<tr>
									<th>tqidnpro03</th>
									<td>101</td>
									<td data-sparkline="56, 12, 8, 25 " />
									<td>191</td>
									<td data-sparkline="69, 14, 53, 55 " />
								</tr>
								<tr>
									<th>tqidnpro04</th>
									<td>303</td>
									<td data-sparkline="81, 50, 78, 94 " />
									<td>76</td>
									<td data-sparkline="36, 15, 14, 11 " />
								</tr>
								<tr>
									<th>tqidnpro05</th>
									<td>200</td>
									<td data-sparkline="61, 80, 10, 49 " />
									<td>217</td>
									<td data-sparkline="100, 8, 52, 57 " />
								</tr>
								<tr>
									<th>tqidnpro06</th>
									<td>118</td>
									<td data-sparkline="13, 48, 21, 36 " />
									<td>273</td>
									<td data-sparkline="98, 86, 8, 81 " />
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg my-2">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">MIDS-BitacoraRH</h6>
					<div class="card-body" id="chart-01" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
			<div class="col-lg my-2">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">Driver 02</h6>
					<div class="card-body" id="chart-02" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
			<div class="col-lg my-2">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">Driver 03</h6>
					<div class="card-body" id="chart-03" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg my-2">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">Driver 04</h6>
					<div class="card-body" id="chart-04" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
			<div class="col-lg my-2">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">Driver 05</h6>
					<div class="card-body" id="chart-05" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
			<div class="col-lg my-2">
				<div class="card border-sat">
					<h6 class="card-header bg-sat text-white">Driver 06</h6>
					<div class="card-body" id="chart-06" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
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
	<script type="text/javascript" src="includes/js/highcharts.js"></script>
	<script type="text/javascript" src="includes/js/main.js"></script>
</body>
</html>
