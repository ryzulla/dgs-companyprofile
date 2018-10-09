<div id="content">


        <div class="outer">
          <div class="inner bg-light lter">
			<div class="main-bar">
            <h3>
              <i class="fa fa-columns"></i>&nbsp;Kategori Berita</h3>
          	</div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                    <i class="glyphicon glyphicon-pencil"></i>
                    </div>
                    <h5>Edit Kategori Berita </h5>
                  	</header>
                  	<?php
					echo validation_errors('<div class="alert alert-warning">','</div>');

					echo form_open(base_url('admin/jenis_berita/edit/'.$jenis_berita->id_jenis_berita));
					?>
					<div class="col-md-8">
					<div class="form-group">
					<label><br/>Kategori Berita</label>
					<input type="text" name="nama_jenis_berita" class="form-control" placeholder="Kategori Berita" value="<?php echo $jenis_berita->nama_jenis_berita ?>" required>
					</div>
					</div>
					<div class="col-md-4">
					<div class="form-group">
					<label><br/>Urutan</label>
					<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $jenis_berita->urutan ?>" required>
					</div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
					<label>Keterangan</label>
					<textarea name="keterangan" class="form-control" placeholder="Keterangan..."><?php echo $jenis_berita->keterangan ?></textarea>
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
