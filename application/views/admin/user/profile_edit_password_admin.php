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
                    <i class="glyphicon glyphicon-pencil"></i>
                    </div>
                    <h5>Edit User </h5>
                  	</header>
					<?php
					echo validation_errors('<div class="alert alert-warning">','</div>');

					if(isset($error)){
						echo '<div class="alert alert-warning">';
						echo $error;
						echo '</div>';
					}

					echo form_open_multipart(base_url('admin/user/profile_edit_password_admin/'.$user->id_user));
					?>
					<div class="col-md-6">
					<div class="form-group">
						<label><br/>Password anda sebagai Admin</label>
						<input type="password" name="password_lama" class="form-control" >
					</div>

					<div class="form-group">
						<label><br/>Password Baru</label>
						<input type="password" name="password" class="form-control" >
					</div>
					<div class="form-group">
						<label>Konfirmasi Password Baru</label>
						<input type="password" name="password2" class="form-control">
					</div>

					</div>
					<div class="col-md-6">
					<div align="center">
						<img src="<?php echo base_url('/assets/admin')?>/setting.png" class="img img-responsive">
					</div>
					<div class="form-group pull-right">
					<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
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
