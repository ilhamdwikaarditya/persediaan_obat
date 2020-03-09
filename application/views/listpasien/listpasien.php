			<div class="page-head">
				<div class="page-title">
					<h1>Pasien Baru <small>Register pasien</small></h1>
				</div>
				<div class="page-toolbar">
					<div class="btn-group btn-theme-panel">
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-12">
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Entry Pasien Baru
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab_1_1" data-toggle="tab">
									List Pasien </a>
								</li>
								<li>
									<a href="#tab_1_2" data-toggle="tab">
									Tambah Pasien </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_1_1">
									<div class="table-toolbar">
										<div class="row">
											<div class="col-md-6">
												<div class="btn-group">
													<a class="btn green" onclick="add_pasien()" data-toggle="modal">Tambah Data </a>
												</div>
											</div>
										</div>
									</div>
									<!-- tabel -->
									<div class="table-scrollable">
										<table class="table table-striped table-bordered table-hover" id="table">
											<thead>
												<tr>
													<th>
														 ID PASIEN
													</th>
													<th>
														 NAMA
													</th>
													<th>
														 ALAMAT
													</th>
													<th>
														 KOTA
													</th>
													<th>
														 PROVINSI
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
								<div class="tab-pane fade" id="tab_1_2">
									<div class="table-toolbar">
										<div class="row">
											<div class="col-md-6">
												<div class="btn-group">
													<a class="btn green" onclick="kembali()" data-toggle="modal">Kembali</a>
												</div>
											</div>
										</div>
									</div>
									<div class="portlet-body form">
										<form action="#" id="form" class="form-horizontal" role="form">
											<input type="hidden" value="" name="id"/>
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-6 control-label">ID Pasien</label>
															<div class="col-md-6">
																<input type="text" name="id_pasien" id="id_pasien" class="form-control input-sm" placeholder=" " readonly="true">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Nama</label>
															<div class="col-md-6">
																<input type="text" name="nama_pasien" class="form-control input-sm" placeholder=" " required />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Alamat</label>
															<div class="col-md-6">
																<input type="text" name="alamat_pasien" class="form-control input-sm" placeholder=" " required />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Provinsi</label>
															<div class="col-md-6">
																<input type="text" name="prov_pasien2" class="form-control input-sm" placeholder=" " >
																<?php echo form_dropdown("prov_pasien",$prov_mohon,'','id="prov_pasien" style="display:none;"'); ?>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Kota</label>
															<div class="col-md-6">
																<input type="text" name="kota_pasien2" class="form-control input-sm" placeholder=" " >
																<?php echo form_dropdown('kota_pasien', array(), '', 'id="kota_pasien" style="display:none;"'); ?>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Kecamatan</label>
															<div class="col-md-6">
																<input type="text" name="kec_pasien2" class="form-control input-sm" placeholder=" " >
																<?php echo form_dropdown('kec_pasien', array(), '', 'id="kec_pasien" style="display:none;"'); ?>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Kodepos</label>
															<div class="col-md-6">
																<input type="number" name="kdpos_pasien" class="form-control input-sm" placeholder=" " onkeypress="return hanyaAngka(event)" required>
															</div>
														</div>
														
													</div>
													<div class="col-md-6">
														
														<div class="form-group">
															<label class="col-md-6 control-label">No. KTP</label>
															<div class="col-md-6">
																<input type="number" name="ktp_pasien" class="form-control input-sm" placeholder=" " onkeypress="return hanyaAngka(event)" required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">No. BPJS</label>
															<div class="col-md-6">
																<input type="number" name="bpjs_pasien" class="form-control input-sm" placeholder=" " onkeypress="return hanyaAngka(event)" required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">No. Telp</label>
															<div class="col-md-6">
																<input type="number" name="telp" class="form-control input-sm" placeholder=" " onkeypress="return hanyaAngka(event)" required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">No Handphone</label>
															<div class="col-md-6">
																<input type="number" name="hp1" class="form-control input-sm" placeholder=" " onkeypress="return hanyaAngka(event)" required>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-6 control-label">Email</label>
															<div class="col-md-6">
																<input type="text" name="email1" class="form-control input-sm" placeholder=" " required>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-actions right">
												<button type="button" id="btnSave" onclick="validasi()" class="btn blue">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- awal -->
									
							<!-- selesai -->
						</div>
					</div>
				</div>
			</div>
			<!-- modal large -->
			<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Entri Pasien Baru</h4>
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
		 2020 &copy; Stock Medicine System.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
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
<!-- END CORE PLUGINS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
<script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
<!-- TAMBAHAN -->
<script src="../../assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/datatables/js/dataTables.bootstrap.js"></script> 
<script>

jQuery(document).ready(function() {
Metronic.init(); 
Layout.init();
Demo.init();
});

var save_method; 
var table;

$(document).ready(function() {
	
    table = $('#table').DataTable({ 
	
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?php echo site_url('pasien/list_pasien')?>",
            "type": "POST"
        },

        "columnDefs": [
        { 
            "targets": [ -1 ], 
            "orderable": false, 
        },
        ],

    });

    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
	
	$("#prov_pasien").on("change", function(){
		var v = $(this).val();
		var baseUrl = '<?php echo site_url(); ?>/pasien/get_chain_kab/'+v;
		removeOptions(document.getElementById("kota_pasien"));
		var kota_pasien = ["--Pilih--"];
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			success: function(datas){
				$.map(datas, function (obj) {
					kota_pasien.push({
					   'id': obj.id_kab,
					   'text': obj.nama
					});
					return kota_pasien;
					
				});
				$("#kota_pasien").select2({
					placeholder: "Pilih",
					data: kota_pasien,
					width: '100%'
				});
				
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator ");
			}
		});
	});

	$("#kota_pasien").on("change", function(){
		var v = $(this).val();
		var baseUrl = '<?php echo base_url(); ?>index.php/pasien/get_chain_kec/'+v;
		removeOptions(document.getElementById("kec_pasien"));
		var kec_pasien = ["--Pilih--"];
		$.ajax({
			url: baseUrl,
			dataType: 'json',
			success: function(datas){
				$.map(datas, function (obj) {
					kec_pasien.push({
					   'id': obj.id_kec,
					   'text': obj.nama
					});
					return kec_pasien;
					
				});
				$("#kec_pasien").select2({
					placeholder: "Pilih",
					data: kec_pasien,
					width: '100%'
				});
				
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator");
			}
		});
	});
	
	noidpasien();
	
});


function add_pasien()
{
    save_method = 'add';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $('.nav-tabs a[href="#tab_1_2"]').tab('show');
    $('[name="kec_pasien2"]').hide();
    $('[name="kota_pasien2"]').hide();
    $('[name="prov_pasien2"]').hide();
    $('[name="kec_pasien"]').show();
    $('[name="kota_pasien"]').show();
    $('[name="prov_pasien"]').show();
    $("#prov_pasien").select2({ width: '100%' });
	$("#kota_pasien").select2({ width: '100%' });
	$("#kec_pasien").select2({ width: '100%' });
	noidpasien();
}

function edit_pasien(id)
{ 
	if ($("#prov_pasien").data('select2')){
		$("#kec_pasien").select2('destroy'); 
		$("#kota_pasien").select2('destroy');
		$("#prov_pasien").select2('destroy'); 
    }
    save_method = 'update';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error');
    $('.help-block').empty(); 

    $.ajax({
        url : "<?php echo site_url('pasien/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="id_pasien"]').val(data.ID_PASIEN);
            $('[name="nama_pasien"]').val(data.NAMA_PASIEN);
            $('[name="alamat_pasien"]').val(data.ALAMAT_PASIEN);
            $('[name="kec_pasien2"]').val(data.KEC_PASIEN);
            $('[name="kota_pasien2"]').val(data.KAB_PASIEN);
            $('[name="prov_pasien2"]').val(data.PROV_PASIEN);
            $('[name="kec_pasien"]').hide();
            $('[name="kota_pasien"]').hide();
            $('[name="prov_pasien"]').hide();
    		$('[name="kec_pasien2"]').show();
    		$('[name="kota_pasien2"]').show();
    		$('[name="prov_pasien2"]').show();
            $('[name="kdpos_pasien"]').val(data.KDPOS_PASIEN);
			$('[name="ktp_pasien"]').val(data.KTP_PASIEN);
			$('[name="bpjs_pasien"]').val(data.BPJS_PASIEN);
            $('[name="telp"]').val(data.TELP);
            $('[name="hp1"]').val(data.HP);
			$('[name="email1"]').val(data.EMAIL);
            
    		$('.nav-tabs a[href="#tab_1_2"]').tab('show');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))

	return false;
  return true;
}

function reload_table()
{
    table.ajax.reload(null,false); 
}

function cek(a) {
	valid = /^[A-Za-z -&.,]{1,}$/;
	return valid.test(a);
}

function validasi(){
	var nama	= document.forms["form"]["nama_pasien"].value;
	var alamat	= document.forms["form"]["alamat_pasien"].value;
	if(save_method == 'add') {
        var kec		= document.forms["form"]["kec_pasien"].value;
		var kota	= document.forms["form"]["kota_pasien"].value;
		var prov	= document.forms["form"]["prov_pasien"].value;
    }
	
	var kdpos	= document.forms["form"]["kdpos_pasien"].value;
	var ktp		= document.forms["form"]["ktp_pasien"].value;
	var bpjs	= document.forms["form"]["bpjs_pasien"].value;
	var telp	= document.forms["form"]["telp"].value;
	var hp1		= document.forms["form"]["hp1"].value;
	var email1	= document.forms["form"]["email1"].value;
	
	if(nama == "" || alamat == "" || kec == "" || kota == "" || prov == "" ){
		alert("Nama, Alamat, Provinsi, Kota, Kecamatan tidak boleh ada yang kosong");
		return false;
	}

	save();
}

function save()
{
    $('#btnSave').text('saving...');
    $('#btnSave').attr('disabled',true);
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('pasien/add')?>";
    } else {
        url = "<?php echo site_url('pasien/update')?>";
    }

    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) 
            {
                $('.nav-tabs a[href="#tab_1_1"]').tab('show');
                reload_table();
            }

            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false); 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); 
            $('#btnSave').attr('disabled',false); 

        }
    });
}

function delete_pasien(id)
{
    if(confirm('Yakin anda ingin menghapus?'))
    {
        $.ajax({
            url : "<?php echo site_url('pasien/delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                $('#large').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
}

function noidpasien(){
	$.ajax({
		url: '<?php echo site_url(); ?>/pasien/otoidpasien',
		type: "POST",
		dataType:"json",
		success:function(datas){
			var agd = $.map(datas, function (obj) {
				var X 		= Math.floor((Math.random() * 10) + 1);
				var urut	= obj.id_pasien;
				var years 	= new Date().getFullYear().toString().substr(2,2);
				var month 	= ("0" + (new Date().getMonth() + 1)).slice(-2);
				var idpasien  = years+month+urut+X;
				$("#id_pasien").val(idpasien);
			});
		}                                     
	});    
}

function kembali(){
    $('.nav-tabs a[href="#tab_1_1"]').tab('show');
}

function removeOptions(selectbox){
	var i;
	for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
	{
		selectbox.remove(i);
	}
}

</script>
</body>
</html>