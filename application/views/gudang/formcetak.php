			
			<div class="page-head">
				<div class="page-title">
					<h1>Cetak Laporan Persediaan <small>Gudang</small></h1>
				</div>
				<div class="page-toolbar">
					<div class="btn-group btn-theme-panel">
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-12">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Cetak
							</div>
						</div>
						<div class="portlet-body">
							<div class="form-body form-horizontal">
								<div class="row">
									<label class="col-md-3 control-label align-left">Tanggal Awal</label>
									<div class="col-md-4">
										<div class="input-group">
											<input id="tgl_awal" name="tgl_awal" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php echo date("Y-m-d"); ?>" autocomplete="off">
										</div>
										<ul id="hasilcari"></ul>
									</div>
								</div><br>
								<div class="row">
									<label class="col-md-3 control-label align-left">Tanggal Akhir</label>
									<div class="col-md-4">
										<div class="input-group">
											<input id="tgl_akhir" name="tgl_akhir" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php echo date("Y-m-d"); ?>" autocomplete="off">
										</div>
										<ul id="hasilcari"></ul>
									</div>
								</div><br>
								<br>
								<div class="row">
									<label class="col-md-3 control-label align-left">&nbsp;</label>
									<div class="col-md-4">
										<div class="input-group">
											<button type="button" id="btnSave" onclick="cetak()" class="btn blue">Cetak</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
</div>
<div class="page-footer">
	<div class="page-footer-inner">
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<style>
.clear{
 clear:both;
 margin-top: 20px;
}

#hasilcari{
 list-style: none;
 padding: 0px;
 width: 325px;
 position: absolute;
 margin: 0;
}

#hasilcari li{
 background: lavender;
 padding: 4px;
 margin-bottom: 1px;
}

#hasilcari li:nth-child(even){
 background: cadetblue;
 color: white;
}

#hasilcari li:hover{
 cursor: pointer;
}

input[type=text]{
 padding: 5px;
 width: 250px;
 letter-spacing: 1px;
}
</style>
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="../../assets/global/plugins/jquery.mockjax.js"></script>
<!-- END CORE PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/components-pickers.js"></script>
<script src="../../assets/admin/pages/scripts/components-dropdowns.js"></script>

<script src="../../assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/datatables/js/dataTables.bootstrap.js"></script> 
<script>

jQuery(document).ready(function() {
Metronic.init();
Layout.init();
Demo.init();
ComponentsPickers.init();
ComponentsDropdowns.init();
});

$(document).ready(function() {
	
	$("#id_dist").select2({ 
		placeholder: "Pilih Distributor",
		width: '100%',
		dropdownAutoWidth: true,
		allowClear: true,
	});
	
	$('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
	
});

function cetak(){
	var tgl_awal  = document.getElementById("tgl_awal").value;
	var tgl_akhir = document.getElementById("tgl_akhir").value;
	
	hreF   = "<?php echo site_url("Report_gudang/rpt_persediaan")?>";
	ReQuest= "/" + tgl_awal +"/" + tgl_akhir;
	window.open(hreF+ReQuest, '_blank');
}


</script>
</body>
</html>