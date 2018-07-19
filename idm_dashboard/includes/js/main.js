$(function(){ // document ready
	var normalOptions={
		chart:{
			type:'bar',
			marginRight:0,
			marginBottom:0,
			marginLeft:0,
			spacing:[0,0,0,0]
		},
		legend:{
			layout:'vertical',
			enabled:false,
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
		rangeSelector:{enabled:false},
		plotOptions: {
			bar: {
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.y:,.0f}'
	            }
	        }
	    },
		series:[{type: 'bar',data: []}]
	};
	myChart=[];
	function update(){
		$.post('includes/php/render.php',{data:'alarms'},function(result){
			fillPafge(result);
		},"json");
	}
	$('[data-toggle="tooltip"]').tooltip();
	update();
	window.setInterval(function(){update();},10*1000);
	function fillPafge(result){
		for(var element of result){
			id=element.name;
			if($('#'+id).length>0){ // si existe, actualizar
				myArray=Object.entries(element.alarms);
				for (var i=0; i < myArray.length; i++) {
				    myArray[i][1] = parseFloat(myArray[i][1]);
				}
				myChart[id].series[0].setData(myArray);
			}
			else{ // si no existe, crear
				$("#driversContainer").append(
					$("<div/>",{"class":"col-lg-3 my-2","id":id}).append(
						$("<div/>",{"class":"card border-sat"}).append(
							$("<h6/>",{"class":"card-header bg-sat text-white",text:id})).append(
							$("<div/>",{"class":"card-body",id:"chart_"+id}).css({"width":"100%","height":"400px"})
						)
					)
				);
				// inicializar contenedor de gráficas
				normalOptions.series=[{type: 'bar',data: []}];
				myChart[id]=Highcharts.stockChart("chart_"+id,normalOptions);
				myArray=Object.entries(element.alarms);
				for (var i=0; i < myArray.length; i++) {
				    myArray[i][1] = parseFloat(myArray[i][1]);
				}
				myChart[id].series[0].setData(myArray);
			}
		}
	}
});
