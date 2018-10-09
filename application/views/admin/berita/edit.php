
<div id="content">


        <div class="outer">
          <div class="inner bg-light lter">
			<div class="main-bar">
            <h3>
              <i class="fa fa-rss"></i>&nbsp; Berita</h3>
          	</div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                    <i class="glyphicon glyphicon-pencil"></i>
                    </div>
                    <h5>Edit Berita</h5>
                  	</header>

                   <?php
echo validation_errors('<div class="alert alert-warning">','</div>');

if(isset($error)){
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));

?>
	<div class="col-md-8">
	<div class="form-group">
		<label></br>Judul Berita</label>
		<input type="text" name="judul" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul ?>" <?php if ($berita->id_user!=$this->session->userdata('id_user')){ echo "readonly";} ?>>
	</div>
	</div>
	<div class="col-md-4">
	<div class="form-group">
		<label></br>Kategori Berita</label>
		<select class="form-control" name="jenis_berita">
			<?php foreach($jenis as $jenis) { ?>
			<option value="<?php echo $jenis->id_jenis_berita ?>"
			<?php if($berita->id_jenis_berita==$jenis->id_jenis_berita){ echo "selected"; } ?>>
			<?php echo $jenis->nama_jenis_berita ?> </option>
			<?php } ?>
		</select>
	</div>
	</div>
	
	<div class="col-md-4">
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status_berita" <?php if ($berita->id_user!=$this->session->userdata('id_user')){ echo "readonly";} ?>>
			<option value="Publish"> Publikasikan </option>
			<option value="Draft"<?php if($berita->status_berita=="Draft"){ echo "selected"; } ?>> Simpan sebagai Draft </option>
		</select>
	</div>
	</div>
	<div class="col-md-4">
	<div class="form-group">
		<label>Gambar Utama Berita</label>
		<div>
		<input type="file" class="Upload" id="fileUpload" name="gambar" <?php if ($berita->id_user!=$this->session->userdata('id_user')){ echo "readonly";} ?>>
		</div>
	</div>
	</div>
	<div class="col-md-12">
	<div class="form-group">
		<label>Lokasi</label>
		<input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="<?php echo $berita->lokasi ?>" <?php if ($berita->id_user!=$this->session->userdata('id_user')){ echo "readonly";} ?>>
	</div>
	</div>
	<?php if($berita->id_jenis_berita!="1"){ ?>
	<div class="col-md-12">
	<div class="form-group">
		<label>Tindak Lanjut Laporan</label>
		<select class="form-control" name="tindak_lanjut">
			<option value="Belum diproses"> Belum diproses  </option>
			<option value="Sudah diproses"<?php if($berita->status_berita=="Sudah diproses"){ echo "selected"; } ?>> Sudah diproses </option>
		</select>
	</div>
	</div>
	<?php } ?>
	<div class="col-md-12">
	<div class="form-group">
		<label>Isi Berita</label>
		<textarea class="form-control" name="isi" placeholder="isi"><?php echo $berita->isi ?></textarea>
		</div>
	<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
	<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>

</div>

		<?php form_close()?>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->

          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
      <script>tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: [
          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'insertdatetime media nonbreaking save table contextmenu directionality',
          'template paste textcolor colorpicker textpattern imagetools'
        ],
        <?php if ($berita->id_user!=$this->session->userdata('id_user')){?>readonly:<?php echo "1,";}else{ ?>readonly:<?php echo "0,";}?>
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor',
        image_advtab: true,
        templates: [
          { title: 'Test template 1', content: 'Test 1' },
          { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css'
        ]
       });</script>
