			<div class="page-head">
				<div class="page-title">
					<h1>Puskesmas ke pasien<small>ke Pasien</small></h1>
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
								<i class="fa fa-globe"></i>Pencarian
							</div>
						</div>
						<div class="portlet-body">
							<div class="form-body form-horizontal">
								<div class="row">
									<label class="col-md-3 control-label align-left">Masukan Nama Obat</label>
									<div class="col-md-4">
										<div class="input-group">
											<input id="cari" name="cari" class="form-control" autocomplete="off" placeholder="autocomplete"/>
											<span class="input-group-btn">
												<a type="button" class="btn green">Cari </a>
											</span>
										</div>
										<ul id="hasilcari"></ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-success">
						<div class="panel-body form-horizontal">

							<div class="form-group">
								<label class="col-md-6 control-label align-left">Tanggal</label>
								<div class="col-md-6">
									<input id="tgl_in" name="tgl_in" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" value="<?php echo date("Y-m-d"); ?>" >
								</div> 
							</div>
<form action="#" id="form" role="form">
							<div class="form-group">
								<label class="col-md-6 control-label align-left">Batch Obat</label>
								<div class="col-md-6">
									<input type="text" id="batch_obat" name="batch_obat" class="form-control" />
								</div>
							</div>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<div class="note note-success">
								<h1 class="block center"><center>Puskesmas Out</center></h1>
							</div>
							</br>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="portlet light">
						<div class="portlet-body">
							<div class="form-body form-horizontal">
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Nama Pasien</label>
									<div class="col-md-6">
										<?php echo form_dropdown("id_pasien",$pasien,'','id="id_pasien" style="display:none;"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Nama Obat</label>
									<div class="col-md-6">
										<input type="hidden" id="id_obat" name="id_obat" class="form-control input-sm" placeholder=" " readonly>
										<input type="text" id="nama_obat" name="nama_obat" class="form-control input-sm" placeholder=" " >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Jenis Obat</label>
									<div class="col-md-6">
										<?php echo form_dropdown("jenis_obat",$jenis_obat,'','id="jenis_obat" style="display:none;"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Efek Samping</label>
									<div class="col-md-6">
										<input type="text" id="efek_obat" name="efek_obat" class="form-control input-sm" placeholder=" " >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Expired</label>
									<div class="col-md-6">
										<input type="text" id="expired" name="expired" class="form-control input-sm datepicker" placeholder=" " >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Stok tersedia</label>
									<div class="col-md-6">
										<input type="text" id="stok" class="form-control input-sm" placeholder=" " readonly >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Satuan tersedia</label>
									<div class="col-md-6">
										<input type="text" id="satuanstok" class="form-control input-sm" placeholder=" " readonly >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Jumlah Akan diambil</label>
									<div class="col-md-6">
										<input type="text" id="jumlah" name="jumlah" class="form-control input-sm" placeholder=" " onkeypress="return isNumberKey(event)" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">Satuan</label>
									<div class="col-md-6">
										<?php echo form_dropdown("satuan",$satuan,'','id="satuan" style="display:none;"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-6 control-label align-left">&nbsp;</label>
									<div class="col-md-6">
										<button type="button" id="btnSave" onclick="validasi()" class="btn blue">Simpan</button>
									</div>
								</div>
</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-body form-horizontal">
							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover" id="OutPuskesmasTbl">
									<thead>
										<tr>
											<th>
												 NAMA PASIEN
											</th>
											<th>
												 NAMA OBAT
											</th>
											<th>
												 JENIS
											</th>
											<th>
												 JUMLAH
											</th>
											<th>
												 EXPIRED
											</th>
											<th>
												 AKSI
											</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
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
 z-index: 999;
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
	
	$("#jenis_obat").select2({ width: '100%' });
	$("#satuan").select2({ width: '100%' });
	$("#id_pasien").select2({ width: '100%' });
    
	$('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
	
	$("#batch_obat").val("batch-"+formatDate(Date.now()));
	batchobat = $("#batch_obat").val();
	
	$('#cari').keyup(function(e) {
		cari = $("#cari").val();
		
		if(cari != ""){

            $.ajax({
                url: '<?php echo site_url()?>/Puskesmas/getObatPuskesmas',
                type: 'post',
                data: {cari:cari, type:1},
                dataType: 'json',
                success:function(response){
                
                    var len = response.length;
                    $("#hasilcari").empty();
                    for( var i = 0; i<len; i++){
                        var id = response[i]['ID_IN_GUDANG'];
                        var name = response[i]['NAMA_OBAT'];
                        var batch = response[i]['BATCH'];
                        $("#hasilcari").append("<li value='"+batch+"'>"+name+" | "+batch+"</li>");

                    }

                    // binding click event to li
                    $("#hasilcari li").bind("click",function(){
                        setText(this);
                    });

                }
            });
        }
		
	});
	
	
	
	$("#tgl_in").on("change", function(){
		filter_tanggal = $(this).val();
		id_pasien 	   = $("#id_pasien").val();
		if(filter_tanggal == ''){
			$("#batch_obat").val("batch-"+formatDate(Date.now()));
		}else{
			$("#batch_obat").val("batch-"+formatDate(filter_tanggal));
		}
		
		$('#OutPuskesmasTbl').DataTable().clear().draw();
		$('#OutPuskesmasTbl').DataTable({
			destroy: true,	
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"processing": true,
			"serverSide": true,
			"ajax": 
			{
				"url": "<?php echo site_url('Puskesmas/Obat_out_Puskesmas')?>",
				"type": 'POST',
				"data": {param:id_pasien,tanggal:filter_tanggal},
			},
		});


	});
	
	$("#id_pasien").on("change", function(){
		id_pasien = $(this).val();
		filter_tanggal = $("#tgl_in").val();
		if(filter_tanggal == ''){
			swal('Gagal','Tentukan Tanggal terlebih dahulu','error');
			return false;
		}

		$('#OutPuskesmasTbl').DataTable().clear().draw();
		$('#OutPuskesmasTbl').DataTable({
			destroy: true,	
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false,
			"processing": true,
			"serverSide": true,
			"ajax": 
			{
				"url": "<?php echo site_url('Puskesmas/Obat_out_Puskesmas')?>",
				"type": 'POST',
				"data": {param:id_pasien,tanggal:filter_tanggal},
			},
		});
				
		
	});
	
	OutPuskesmasTbl = $('#OutPuskesmasTbl').DataTable({ 
		destroy: true,
		"bPaginate": false,
		"bLengthChange": false,
		"bFilter": false,
		"bInfo": false,
		"bAutoWidth": false,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?php echo site_url('Puskesmas/Obat_out_Puskesmas')?>",
            "type": "POST",
            "data": {param:batchobat},
        },

        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });
	

});

function setText(element){

    var value = $(element).text();
    var batch = $(element).val();

    $("#cari").val(value);
    $("#hasilcari").empty();
    
    $.ajax({
        url: '<?php echo site_url()?>/Puskesmas/getObatPuskesmas',
        type: 'post',
        data: {batch:batch, type:2},
        dataType: 'json',
        success: function(response){
			
            var len = response.length;
            if(len > 0){
				$("#batch_obat").val(response[0]['BATCH_OBAT']);
				$("#id_obat").val(response[0]['ID_OBAT']);
				$("#nama_obat").val(response[0]['NAMA_OBAT']);
				$("#jenis_obat").val(response[0]['JENIS_OBAT']).trigger('change');
				$("#efek_obat").val(response[0]['EFEK_OBAT']);
				$("#expired").val(response[0]['EXPIRED']);
				$("#stok").val(response[0]['STOK']);
				$("#satuanstok").val(response[0]['NM_SATUAN']);
            }
			$('#OutPuskesmasTbl').DataTable().clear().draw();
			$('#OutPuskesmasTbl').DataTable({
				destroy: true,	
				"bPaginate": false,
				"bLengthChange": false,
				"bFilter": false,
				"bInfo": false,
				"bAutoWidth": false,
				"processing": true,
				"serverSide": true,
				"ajax": 
				{
					"url": "<?php echo site_url('Puskesmas/Obat_out_Puskesmas')?>",
					"type": 'POST',
					"data": {param:"batch-"+batch},						
				},
			});
			
        }

    });
}

function validasi(){
	nd = $("#id_pasien").val();
	nob= $("#nama_obat").val();
	jo = $("#jenis_obat").val();
	es = $("#efek_obat").val();
	ex = $("#expired").val();
	ju = $("#jumlah").val();
	sa = $("#satuan").val();
	st = $("#stok").val();
	if(nd == ''){
		swal('Gagal','Nama Pasien tidak boleh kosong','error');
		return false;
	}
	if(nob == ''){
		swal('Gagal','Nama Obat tidak boleh kosong','error');
		return false;
	}
	if(jo == ''){
		swal('Gagal','Tentukan jenis obat','error');
		return false;
	}
	if(es == ''){
		swal('Gagal','Efek samping tidak boleh kosong','error');
		return false;
	}
	if(ex == ''){
		swal('Gagal','Tentukan Expired','error');
		return false;
	}
	if(ju == ''){
		swal('Gagal','Jumlah tidak boleh kosong','error');
		return false;
	}
	if(sa == ''){
		swal('Gagal','Tentukan satuan','error');
		return false;
	}
	if(parseInt(ju) > parseInt(st)){
		swal('Gagal','Melebihi jumlah stok yang ada','error');
		return false;
	}

    $.ajax({
        url: '<?php echo site_url()?>/Puskesmas/saveObatPasien',
        type: 'post',
        data: $('#form').serialize(),
        dataType: 'json',
        success: function(response){
			var id_pasienagain = $("#id_pasien").val();
            $('#OutPuskesmasTbl').DataTable().clear().draw();
			$('#OutPuskesmasTbl').DataTable({
				destroy: true,	
				"bPaginate": false,
				"bLengthChange": false,
				"bFilter": false,
				"bInfo": false,
				"bAutoWidth": false,
				"processing": true,
				"serverSide": true,
				"ajax": 
				{
					"url": "<?php echo site_url('Puskesmas/Obat_out_Puskesmas')?>",
					"type": 'POST',
					"data": {param:id_pasienagain},						
				},
			});
        }

    });
}

function delete_obat(id){

	
	swal({
		title: 'Konfirmasi',
		text: "Anda ingin menghapus ",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Hapus',
		confirmButtonColor: '#d33',
		cancelButtonColor: '#3085d6',
		cancelButtonText: 'Tidak',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url : "<?php echo site_url('Puskesmas/delete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					swal.fire(
					  'Deleted!',
					  'Berhasil dihapus.',
					  'success'
					)
				}
			});
			OutPuskesmasTbl.ajax.reload();
		} else if (result.dismiss === swal.DismissReason.cancel) {
			swal(
				'Batal',
				'Anda membatalkan penghapusan',
				'error'
			)
		}
	});
	
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('');
}

function isNumberKey(evt)
  {
    var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
    var charCode = e.which || e.keyCode;                        
    if (charCode > 31 && (charCode < 47 || charCode > 57))
    return false;
    if (e.shiftKey) return false;
    return true;
 }

</script>
</body>
</html>