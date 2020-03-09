			<div class="page-head">
				<div class="page-title">
					<h1>Obat Baru <small>Register Obat</small></h1>
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
								<i class="fa fa-globe"></i>Entry Obat Baru
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
									List Obat </a>
								</li>
								<li class="disabled">
									<a href="#tab_1_2" data-toggle="tab">
									Tambah Obat </a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_1_1">
									<div class="table-toolbar">
										<div class="row">
											<div class="col-md-6">
												<div class="btn-group">
													<a class="btn green" onclick="add_obat()" data-toggle="modal">Tambah Data </a>
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
														 ID OBAT
													</th>
													<th>
														 NAMA
													</th>
													<th>
														 JENIS
													</th>
													<th>
														 EFEK SAMPING
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
															<label class="col-md-6 control-label">Batch Obat</label>
															<div class="col-md-6">
																<input type="text" name="batch_obat" id="batch_obat" class="form-control input-sm" readonly />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Nama Obat</label>
															<div class="col-md-6">
																<input type="text" name="nama_obat" class="form-control input-sm" placeholder=" " required />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Jenis Obat</label>
															<div class="col-md-6">
																<input type="text" name="jenis_obat2" class="form-control input-sm" placeholder=" " >
																<?php echo form_dropdown("jenis_obat",$jenis_obat,'','id="jenis_obat" style="display:none;"'); ?>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-6 control-label">Efek Samping</label>
															<div class="col-md-6">
																<input type="text" name="efek_obat" class="form-control input-sm" placeholder=" " required />
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
							<h4 class="modal-title">Entri Obat Baru</h4>
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
            "url": "<?php echo site_url('obat/list_obat')?>",
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
	
});


function add_obat()
{
    save_method = 'add';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 
    $('.nav-tabs a[href="#tab_1_2"]').tab('show');
    $('[name="jenis_obat2"]').hide();
    $('[name="jenis_obat"]').show();
    $("#jenis_obat").select2({ width: '100%' });
	$("#batch_obat").val("batch-"+formatDate(Date.now()));
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

function edit_obat(id)
{ 
	if ($("#jenis_obat").data('select2')){
		$("#jenis_obat").select2('destroy'); 
    }
    save_method = 'update';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error');
    $('.help-block').empty(); 

    $.ajax({
        url : "<?php echo site_url('obat/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="batch_obat"]').val(data.BATCH_OBAT);
            $('[name="nama_obat"]').val(data.NAMA_OBAT);
            $('[name="jenis_obat"]').val(data.JENIS_OBAT).trigger('change');
            $('[name="efek_obat"]').val(data.EFEK_OBAT);
			
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
	var nama	= document.forms["form"]["nama_obat"].value;
	if(save_method == 'add') {
        var jenis_obat	= document.forms["form"]["jenis_obat"].value;
    }
	
	var efek	= document.forms["form"]["efek_obat"].value;
	
	if(nama == "" || jenis_obat == "" ){
		alert("Nama, Jenis tidak boleh ada yang kosong");
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
        url = "<?php echo site_url('obat/add')?>";
    } else {
        url = "<?php echo site_url('obat/update')?>";
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

function delete_obat(id)
{
    if(confirm('Yakin anda ingin menghapus?'))
    {
        $.ajax({
            url : "<?php echo site_url('obat/delete')?>/"+id,
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