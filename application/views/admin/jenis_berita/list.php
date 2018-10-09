<div id="content">


        <div class="outer">
          <div class="inner bg-light lter">
<div class="main-bar">
            <h3>
              <i class="fa fa-columns"></i>&nbsp; Kategori Layanan</h3>
          </div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-bookmark-o"></i>
                    </div>
                    <h5>List Kategori Layanan </h5>
                  </header>
                  <div id="collapse4" class="body">
                    <?php
                    include('tambah.php');?></p>
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
                        <th>Kategori Berita</th>
                        <th>Keterangan</th>
                        <th>urutan</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($jenis_berita as $jenis_berita){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $jenis_berita->nama_jenis_berita ?></td>
                        <td><?php echo substr($jenis_berita->keterangan,0,70) ?></td>
                        <td><?php echo $jenis_berita->urutan ?></td>
                        <td align="center">
                        <a href="<?php echo base_url('admin/jenis_berita/edit/'.$jenis_berita->id_jenis_berita)?>" class="btn btn-success" title="Edit User">
                        <i class="fa fa-edit"></i></a>
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
