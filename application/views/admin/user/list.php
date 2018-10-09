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
                      <i class="fa fa-bookmark-o"></i>
                    </div>
                    <h5>List User </h5>
                  </header>
                  <div id="collapse4" class="body">
                     <p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a></p>
                    <?php
                    if($this->session->flashdata('sukses')){
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                    ?>
                    <div style="height: auto; overflow: auto; width: auto;">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($user as $user){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td align="center"><img src="<?php echo base_url('/assets/admin/user/upload/image/thumbs/'.$user->gambar) ?>" width="60" height="60"></td>
                        <td><?php echo $user->nama_user ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->level ?></td>
                        <td><?php echo $user->tanggal_buat ?></td>
                        <td align="center">
                        <a href="<?php echo base_url('admin/user/prof_user/'.$user->id_user)?>" class="btn btn-primary" title="Lihat User">
                        <i class="fa fa-eye"></i></a>
                        <?php
                            include('delete.php');
                        ?>
                        </td>
                      </tr>
                      <?php $i++; } ?>
                     </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->
            <div class="row">

            </div>
            <div class="row">


            </div>
            <div class="row">


            </div>
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->