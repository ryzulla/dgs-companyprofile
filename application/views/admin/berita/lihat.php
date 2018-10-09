<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?echo $title ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<!-- Default box -->
<div class="box">
<div class="box-header">
<div class="col-md-6">
	<div class="box">
	<div class="box-header with-border">
		<label>Nama Lengkap</label><hr>
		<small><?php echo $user->nama_user ?></small>
	</div>
	</div>
	<div class="box">
	<div class="box-header with-border box-body">
		<label>Alamat</label><hr>
		<small><?php echo $user->alamat ?></small>
	</div>
	</div>
	<div class="box">
	<div class="box-header with-border">
		<label>Kota</label><hr>
		<p><small><?php echo $user->kota ?></small></p>
	</div>
	</div>
		<div class="box">
	<div class="box-header with-border">
		<label>Telp</label><hr>
		<small><?php echo $user->telp ?></small>
	</div>
	</div>
</div>
<div class="col-md-6">
	<div class="box">
	<div class="box-header with-border">
		<label>Email</label><hr>
		<small><?php echo $user->email ?></small>
	</div>
	</div>
		<div class="box">
	<div class="box-header with-border">
		<label>Level Hak Akses</label><hr>
		<small><?php echo $user->level ?></small>
	</div>
	</div>
	<div align="right">
	<p><a href="<?php echo base_url('admin/user/') ?>" class="btn btn-default btn-lg"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
	<a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-success btn-lg"><i class="fa fa-edit"></i> Edit</a>
	 <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal<?php echo $user->id_user ?>" title="Delete User">
     <i class="fa fa-trash-o"></i> Delete
    </button>
    <div class="modal fade" id="myModal<?php echo $user->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel" align="center">Hapus Data</h4>
                </div>
                <div class="modal-body" align="center">
                    Apakah anda yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, Hapus data ini!</a>
                </div>
            </div>
        </div>
    </div></p>
    </div>
</div>
</div>
</div>
<?php
echo form_close();
?>

</section><!-- /.content -->
