			<div class="page-head">
				<div class="page-title">
					<h1>Dashboard <small>statistics & reports</small></h1>
				</div>
				<div class="page-toolbar">

				</div>
			</div>
			<ul class="page-breadcrumb breadcrumb hide">
				<li>
					<a href="#">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Dashboard
				</li>
			</ul>
			<div class="row margin-top-10">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-green-sharp"><?php echo "193"?><small class="font-green-sharp"></small></h3>
								<small>TOTAL PASIEN TERDAFTAR</small>
							</div>
							<div class="icon">
								<i class="icon-user"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 progress
								</div>
								<div class="status-number">
									 76%
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-red-haze"><?php echo "24"?></h3>
								<small>TOTAL PASIEN HARI INI</small>
							</div>
							<div class="icon">
								<i class="icon-user"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 change
								</div>
								<div class="status-number">
									 85%
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-blue-sharp"><?php echo number_format("2430")?></h3>
								<small>TOTAL OBAT</small>
							</div>
							<div class="icon">
								<i class="icon-pie-chart"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 grow
								</div>
								<div class="status-number">
									 100%
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-purple-soft"><font size="5"><?php echo number_format("122")?></font></h3>
								<small>TOTAL OBAT AKAN EXPIRED</small>
							</div>
							<div class="icon">
								<i class="icon-pie-chart"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 change
								</div>
								<div class="status-number">
									 100%
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-haze"></i>
								<span class="caption-subject bold uppercase font-green-haze"> Grafik Penyakit Terbanyak</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_langbyarea"  style="height: 250px;">
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
				<div class="col-md-6">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-bar-chart font-green-haze"></i>
								<span class="caption-subject bold uppercase font-green-haze"> Grafik Usia Pasien</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="fullscreen">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_langbygol"  style="height: 250px;">
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>

			<!-- END PAGE CONTENT INNER -->
			</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/amcharts.js"> </script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/serial.js"> </script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/pie.js"> </script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/light.js"> </script>
<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/dataloader.min.js"> </script>	

<script src="../../assets/global/plugins/flot/jquery.flot.min.js"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.time.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/charts-amcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/charts-flotcharts.js"></script>
<script>
jQuery(document).ready(function() {
Metronic.init();
Layout.init();
Demo.init();
});
</script>
<script>
	var chart = AmCharts.makeChart( "chart_langbyarea", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_langbyarea/"
		},
		"valueField": "jml",
		"titleField": "area",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
	
	var chart = AmCharts.makeChart( "chart_langbygol", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_langbygol/"
		},
		"valueField": "jml",
		"titleField": "gol",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
	
	var chart = AmCharts.makeChart( "chart_dayabyarea", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_dayabyarea/"
		},
		"valueField": "jml",
		"titleField": "area",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
	
	var chart = AmCharts.makeChart( "chart_dayabygol", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_dayabygol/"
		},
		"valueField": "jml",
		"titleField": "gol",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
	
	var chart = AmCharts.makeChart( "chart_kwhbyarea", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_kwhbyarea/"
		},
		"valueField": "jml",
		"titleField": "area",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
	
	var chart = AmCharts.makeChart( "chart_kwhbygol", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_kwhbygol/"
		},
		"valueField": "jml",
		"titleField": "gol",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
	
	var chart = AmCharts.makeChart( "chart_pendapatanbyarea", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_pendapatanbyarea/"
		},
		"valueField": "jml",
		"titleField": "area",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
	
	var chart = AmCharts.makeChart( "chart_pendapatanbygol", {
		"hideCredits":true,
		"type": "pie",
		"dataLoader": {
			"url": "<?php echo base_url(); ?>index.php/Welcome/get_chart_pendapatanbygol/"
		},
		"valueField": "jml",
		"titleField": "gol",
		"colorField": "color",
		"colors" : ["#4dcce7", "#f20f26", "#e3f00b", "#0bf03d"],
		"gradientRatio": [0, 0, 0 ,-0.2, -0.4],
		"gradientType": "radial"
	});
$(document).ready(function() {		
		if ($('#chart_x').size() != 1) {
			return;
		}
				
		function randValue() {
			return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
		}
		var target = [
			["Januari", <?php print_r($grafikkwh[0]['Januari']);?>],
			["Februari", <?php print_r($grafikkwh[0]['Februari']);?>],
			["Maret", <?php print_r($grafikkwh[0]['Maret']);?>],
			["April", <?php print_r($grafikkwh[0]['April']);?>],
			["Mei", <?php print_r($grafikkwh[0]['Mei']);?>],
			["Juni", <?php print_r($grafikkwh[0]['Juni']);?>],
			["Juli", <?php print_r($grafikkwh[0]['Juli']);?>],
			["Agustus", <?php print_r($grafikkwh[0]['Agustus']);?>],
			["September", <?php print_r($grafikkwh[0]['September']);?>],
			["Oktober", <?php print_r($grafikkwh[0]['Oktober']);?>],
			["November", <?php print_r($grafikkwh[0]['November']);?>],
			["Desember", <?php print_r($grafikkwh[0]['Desember']);?>]
		];
		
		var realisasi = [
			["Januari", <?php print_r($grafikkwh[0]['Januarikom']);?>],
			["Februari", <?php print_r($grafikkwh[0]['Februarikom']);?>],
			["Maret", <?php print_r($grafikkwh[0]['Maretkom']);?>],
			["April", <?php print_r($grafikkwh[0]['Aprilkom']);?>],
			["Mei", <?php print_r($grafikkwh[0]['Meikom']);?>],
			["Juni", <?php print_r($grafikkwh[0]['Junikom']);?>],
			["Juli", <?php print_r($grafikkwh[0]['Julikom']);?>],
			["Agustus", <?php print_r($grafikkwh[0]['Agustuskom']);?>],
			["September", <?php print_r($grafikkwh[0]['Septemberkom']);?>],
			["Oktober", <?php print_r($grafikkwh[0]['Oktoberkom']);?>],
			["November", <?php print_r($grafikkwh[0]['Novemberkom']);?>],
			["Desember", <?php print_r($grafikkwh[0]['Desemberkom']);?>]
		];

		var plot = $.plot($("#chart_x"), [
		{	data: target,
			label: "Target",
			lines: { lineWidth: 1, },
			shadowSize: 0 
		}, 
		{
			data: realisasi,
			label: "Realisasi",
			lines: {
				lineWidth: 1,
			},
			shadowSize: 0
		}], {
			series: {
				lines: {
					show: true,
					lineWidth: 2,
					fill: true,
					fillColor: {
						colors: [{
							opacity: 0.05
						}, {
							opacity: 0.01
						}]
					}
				},
				points: {
					show: true,
					radius: 3,
					lineWidth: 1
				},
				shadowSize: 2
			},
			grid: {
				hoverable: true,
				clickable: true,
				tickColor: "#eee",
				borderColor: "#eee",
				borderWidth: 1
			},
			colors: ["#d12610", "#37b7f3", "#52e136"],
			xaxis: {
				//mode: "time", 
				//min: (new Date("2018/01/01")).getTime(),
				//max: (new Date("2018/12/31")).getTime()
				//ticks: 11,
				//tickDecimals: 0,
				//tickColor: "#eee",
				mode: "categories",
				tickLength: 0
			},
			yaxis: {
				ticks: 11,
				tickDecimals: 0,
				tickColor: "#eee"
				//mode: "categories",
				//tickLength: 0
			}
		});


		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css({
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 15,
				border: '1px solid #333',
				padding: '4px',
				color: '#fff',
				'border-radius': '3px',
				'background-color': '#333',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#chart_x").bind("plothover", function(event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

			if (item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;

					$("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
						y = item.datapoint[1].toFixed(2);

					showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
				}
			} else {
				$("#tooltip").remove();
				previousPoint = null;
			}
		});
		
		
		if ($('#chart_y').size() != 1) {
			return;
		}
				
		function randValue() {
			return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
		}
		var targety = [
			["Januari", <?php print_r($grafikincome[0]['Januari']);?>],
			["Februari", <?php print_r($grafikincome[0]['Februari']);?>],
			["Maret", <?php print_r($grafikincome[0]['Maret']);?>],
			["April", <?php print_r($grafikincome[0]['April']);?>],
			["Mei", <?php print_r($grafikincome[0]['Mei']);?>],
			["Juni", <?php print_r($grafikincome[0]['Juni']);?>],
			["Juli", <?php print_r($grafikincome[0]['Juli']);?>],
			["Agustus", <?php print_r($grafikincome[0]['Agustus']);?>],
			["September", <?php print_r($grafikincome[0]['September']);?>],
			["Oktober", <?php print_r($grafikincome[0]['Oktober']);?>],
			["November", <?php print_r($grafikincome[0]['November']);?>],
			["Desember", <?php print_r($grafikincome[0]['Desember']);?>]
		];
		
		var realisasiy = [
			["Januari", <?php print_r($grafikincome[0]['Januarikom']);?>],
			["Februari", <?php print_r($grafikincome[0]['Februarikom']);?>],
			["Maret", <?php print_r($grafikincome[0]['Maretkom']);?>],
			["April", <?php print_r($grafikincome[0]['Aprilkom']);?>],
			["Mei", <?php print_r($grafikincome[0]['Meikom']);?>],
			["Juni", <?php print_r($grafikincome[0]['Junikom']);?>],
			["Juli", <?php print_r($grafikincome[0]['Julikom']);?>],
			["Agustus", <?php print_r($grafikincome[0]['Agustuskom']);?>],
			["September", <?php print_r($grafikincome[0]['Septemberkom']);?>],
			["Oktober", <?php print_r($grafikincome[0]['Oktoberkom']);?>],
			["November", <?php print_r($grafikincome[0]['Novemberkom']);?>],
			["Desember", <?php print_r($grafikincome[0]['Desemberkom']);?>]
		];

		var plot = $.plot($("#chart_y"), [
		{	data: targety,
			label: "Target",
			lines: { lineWidth: 1, },
			shadowSize: 0 
		}, 
		{
			data: realisasiy,
			label: "Realisasi",
			lines: {
				lineWidth: 1,
			},
			shadowSize: 0
		}], {
			series: {
				lines: {
					show: true,
					lineWidth: 2,
					fill: true,
					fillColor: {
						colors: [{
							opacity: 0.05
						}, {
							opacity: 0.01
						}]
					}
				},
				points: {
					show: true,
					radius: 3,
					lineWidth: 1
				},
				shadowSize: 2
			},
			grid: {
				hoverable: true,
				clickable: true,
				tickColor: "#eee",
				borderColor: "#eee",
				borderWidth: 1
			},
			colors: ["#d12610", "#37b7f3", "#52e136"],
			xaxis: {
				//mode: "time", 
				//min: (new Date("2018/01/01")).getTime(),
				//max: (new Date("2018/12/31")).getTime()
				//ticks: 11,
				//tickDecimals: 0,
				//tickColor: "#eee",
				mode: "categories",
				tickLength: 0
			},
			yaxis: {
				ticks: 11,
				tickDecimals: 0,
				tickColor: "#eee"
				//mode: "categories",
				//tickLength: 0
			}
		});


		function showTooltipy(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css({
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 15,
				border: '1px solid #333',
				padding: '4px',
				color: '#fff',
				'border-radius': '3px',
				'background-color': '#333',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		$("#chart_y").bind("plothover", function(event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

			if (item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;

					$("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
						y = item.datapoint[1].toFixed(2);

					showTooltipy(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
				}
			} else {
				$("#tooltip").remove();
				previousPoint = null;
			}
		});
		
		
});
</script>
</body>
</html>