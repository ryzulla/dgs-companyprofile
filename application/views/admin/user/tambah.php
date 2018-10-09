<div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
			<div class="main-bar">
            <h3>
              <i class="fa fa-user"></i>&nbsp; User</h3>
          	</div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                    <i class="fa fa-plus"></i>
                    </div>
                    <h5>Tambah User </h5>
                  	</header>
                  <?php
					echo validation_errors('<div class="alert alert-warning">','</div>');

					if(isset($error)){
						echo '<div class="alert alert-warning">';
						echo $error;
						echo '</div>';
					}

					echo form_open_multipart(base_url('admin/user/tambah'));

					?>
						<div class="col-md-6">
							<div class="form-group">
								<label><br/>Nama Lengkap</label>
								<input type="text" name="nama_user" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_user')?>">
							</div>

							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo set_value('alamat')?></textarea>
							</div>
							<div class="form-group">
								<label>Kota</label>
								<input type="text" name="kota" class="form-control" placeholder="Kota" value="<?php echo set_value('kota')?>">
							</div>
							<div class="form-group">
								<label>Telp</label>
								<input type="text" name="telp" class="form-control" placeholder="08xxxxxxxxxx" value="<?php echo set_value('telp')?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><br/>Email</label>
								<input type="text" name="email" class="form-control" placeholder="Email@mail.com" value="<?php echo set_value('email')?>">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>">
							</div>
							<div class="form-group">
								<label>Level Hak Akses</label>
								<select name="level" class="form-control">
									<option value="Admin">Admin</option>
									<!-- <option value="User">User</option> -->
								</select>
							</div>
							<div class="form-group">
								<label>Photo Profil</label>
								<div>
								<input type="file" class="Upload" id="fileUpload" name="gambar">
								</div>
							</div>

							<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
							<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
							</div>

						</div>

							<?php form_close()?>

                </div>
              </div>
            </div>
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
