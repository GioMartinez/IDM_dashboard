$(function(){ // document ready
	var normalOptions={
		chart:{
			type:'areaspline',
			marginRight:60,
			marginBottom:20,
			marginLeft:35,
			spacing:[25,0,0,20]
		},
		legend:{
			layout:'vertical',
			enabled:true,
			align:'left',
			verticalAlign:'top'
		},
		exporting:{
			buttons:{
				contextButton:{
					menuItems:[
						{textKey:'downloadJPEG',onclick:function(){this.exportChart({type:'image/jpeg'});}},
						{textKey:'downloadPDF',onclick:function(){this.exportChart({type:'application/pdf'});}},
						{textKey:'downloadCSV',onclick:function(){this.downloadCSV();}},
						{textKey:'downloadXLS',onclick:function(){this.downloadXLS();}}
					]
				}
			}
		},
		navigator:{enabled:false},
		scrollbar:{enabled:false},
		rangeSelector:{
			inputEnabled:false,
			selected:0,
			allButtonsEnabled:true,
			buttons:[
				{type:'day',count:1,text:'1d'}
			]
		},
		plotOptions:{series:{dataGrouping:{enabled:true}}},
		xAxis:{
			type:'datetime',
			visible:true,
			labels:{enabled:true}
		},
		yAxis:{
			visible:true,
			opposite:false,
			labels:{enabled:true}
		},
		series:[{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]}]
	};
	var sparkOptions={
		chart:{type:'areaspline'},
		exporting:{enabled:false},
		tooltip:{pointFormat:'<span style="color:{point.color}">\u25CF</span> <b>{point.y}</b><br/>',},
		series:[{data:[]}]
	};
	// Disponibilidad
	function update(){
		myChart=[];
		myChildrens=$("#driversContainer").children();
		for(myChild of myChildrens){
			function loop(myChild){
				setTimeout(function(){
					var mySeries = myChild.getAttribute("series");
					normalOptions.series=[{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]},{data:[]}];
					myChart[mySeries]=Highcharts.stockChart("chart_"+mySeries,normalOptions);
					charts01 = {series:"Drivers_"+mySeries,property:'PublisherCR_Instance'};
					charts02 = {series:"Drivers_"+mySeries,property:'PublisherCR_Status'};
					charts03 = {series:"Drivers_"+mySeries,property:'Publisher_Reported_Events_Query'};
					charts04 = {series:"Drivers_"+mySeries,property:'Publisher_Reported_Events_Status'};
					charts05 = {series:"Drivers_"+mySeries,property:'Size'};
					charts06 = {series:"Drivers_"+mySeries,property:'Subscriber_Add'};
					charts07 = {series:"Drivers_"+mySeries,property:'Subscriber_Cache_Add'};
					charts08 = {series:"Drivers_"+mySeries,property:'Subscriber_Cache_Modify'};
					charts09 = {series:"Drivers_"+mySeries,property:'Subscriber_Delete'};
					charts10 = {series:"Drivers_"+mySeries,property:'Subscriber_Rename'};
					charts11 = {series:"Drivers_"+mySeries,property:'Subscriber_modify'};
					
					$.post('includes/php/render.php',charts01,function(result){
						myChart[mySeries].series[0].setData(result);
						myChart[mySeries].legend.allItems[0].update({name:"PublisherCR_Instance"});
					},"json");
					$.post('includes/php/render.php',charts02,function(result){
						myChart[mySeries].series[1].setData(result);
						myChart[mySeries].legend.allItems[1].update({name:"PublisherCR_Status"});
					},"json");
					$.post('includes/php/render.php',charts03,function(result){
						myChart[mySeries].series[2].setData(result);
						myChart[mySeries].legend.allItems[2].update({name:"Publisher_Reported_Events_Query"});
					},"json");
					$.post('includes/php/render.php',charts04,function(result){
						myChart[mySeries].series[3].setData(result);
						myChart[mySeries].legend.allItems[3].update({name:"Publisher_Reported_Events_Status"});
					},"json");
					$.post('includes/php/render.php',charts05,function(result){
						myChart[mySeries].series[4].setData(result);
						myChart[mySeries].legend.allItems[4].update({name:"Size"});
					},"json");
					$.post('includes/php/render.php',charts06,function(result){
						myChart[mySeries].series[5].setData(result);
						myChart[mySeries].legend.allItems[5].update({name:"Subscriber_Add"});
					},"json");
					$.post('includes/php/render.php',charts07,function(result){
						myChart[mySeries].series[6].setData(result);
						myChart[mySeries].legend.allItems[6].update({name:"Subscriber_Cache_Add"});
					},"json");
					$.post('includes/php/render.php',charts08,function(result){
						myChart[mySeries].series[7].setData(result);
						myChart[mySeries].legend.allItems[7].update({name:"Subscriber_Cache_Modify"});
					},"json");
					$.post('includes/php/render.php',charts09,function(result){
						myChart[mySeries].series[8].setData(result);
						myChart[mySeries].legend.allItems[8].update({name:"Subscriber_Delete"});
					},"json");
					$.post('includes/php/render.php',charts10,function(result){
						myChart[mySeries].series[9].setData(result);
						myChart[mySeries].legend.allItems[9].update({name:"Subscriber_Rename"});
					},"json");
					$.post('includes/php/render.php',charts11,function(result){
						myChart[mySeries].series[10].setData(result);
						myChart[mySeries].legend.allItems[10].update({name:"Subscriber_modify"});
						myChart[mySeries].redraw();
					},"json");
					loop(myChild);
				},1);
			}
			loop(myChild);
		}
	}
	$('[data-toggle="tooltip"]').tooltip();
	update();
	window.setInterval(function(){
		update();
	},1*60*1000);
});
