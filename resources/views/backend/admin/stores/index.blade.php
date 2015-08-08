@extends('backend.layout')

@section('css')

@stop

@section('contents')

	<div id="container" style="width: auto; height: 400px; margin: 0 auto">test</div>

@stop

@section('javascript')
	<script>

		console.log('start');
		
		;(function($){
			
			 $('#container').highcharts({
			        chart: {
			            type: 'column'
			        },
			        title: {
			            text: 'Monthly'
			        },
			        xAxis: {
			            categories: [
			                'Jan',
			                'Feb',
			                'Mar',
			                'Apr',
			                'May',
			                'Jun',
			                'Jul',
			                'Aug',
			                'Sep',
			                'Oct',
			                'Nov',
			                'Dec'
			            ],
			            crosshair: true
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Visitor Count'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y}</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            }
			        },
			        series: [{
			            name: 'Monthly Visitor Volume',
			            data: [1200, 900, 700, 650, 800, 9029, 13512, 1423, 1162, 2000, 952, 543]
			        }]
			    });
		
		})(jQuery);	

		console.log('end');

	</script>	
@stop
