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
                    <i class="fa fa-user"></i>
                    </div>
                    <h5>Lihat User </h5>
                  	</header>
					         <?php
                    if($this->session->flashdata('sukses')){
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                      }
                    ?>
				<div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Nama Lengkap</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                    <?php echo $user->nama_user ?>
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h5>Email</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                    <?php echo $user->email ?>
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h5>Alamat</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                  <div style="height: auto; overflow: auto; width: auto;">
                    <span><?php echo $user->alamat;?><br/>Kota - <?php echo $user->kota ?></span>
                  </div>
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h5>Telepon</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
					         <?php echo $user->telp ?>
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h5>Hak Akses</h5>
                    <div class="toolbar"></div>
                  </header>
                  <div class="body">
                    <?php echo $user->level ?><br/>Dibuat pada - <?php echo $user->tanggal_buat ?>
                  </div>
                </div>
              </div><!-- /.col-lg-4 -->

              <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Photo Profile</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                    		<center><img src="<?php echo base_url('/assets/admin/user/upload/image/'.$user->gambar) ?>" class="img img-responsive"></center>                  </div>
                </div>
              </div><!-- /.col-lg-4 -->
<div class="col-lg-12">
 <div>
	<div align="right">
	<p><a href="<?php echo base_url('admin/user/profile_edit/'.$user->id_user)?>" class="btn btn-success btn-lg"><i class="fa fa-edit"></i> Edit Profile</a>
  <a href="<?php echo base_url('admin/user/profile_edit_password/'.$user->id_user)?>" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-cog "></i> Edit Password</a>
    </p>
    </div>
</div>


                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->

          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
