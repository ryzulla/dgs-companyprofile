<div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
<div class="main-bar">
            <h3>
              <i class="fa fa-rss"></i>&nbsp; Welcome</h3>
          </div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-bookmark-o"></i>
                    </div>
                    <h5>PT. DWI GUNA SENTOSA </h5>
                  </header>
                  <div id="collapse4" class="body">
                   <p>Selamat datang di admin panel PT. DWI GUNA SENTOSA. Pada halaman ini anda dapat melakukan pengaturan isi konten dari website PT. DWI GUNA SENTOSA</p>                  </div>
                </div>
              </div>
            </div><!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-bookmark-o"></i>
                    </div>
                    <h5>List Berita </h5>
                  </header>
                  <div id="collapse4" class="body">
                  <p><a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a></p>
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
            		<th>Gambar</th>
                        <th>Judul</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php

                      foreach($berita as $berita){ ?>
                      <tr>
                        <td align="center"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" class="img img-responsive" ></td>
                        <td><h4><a href="<?php echo base_url('news/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul ?></a></h4><p>
                        <small><b>Lokasi :</b> <?php echo $berita->lokasi ?></small><br>
                         <small><b>Author :</b> <a href="<?php echo base_url('admin/user/lihat/'.$berita->email)?>" class="link"><?php echo $berita->nama_user ?></a><br><b>Tanggal :</b> <?php echo $berita->tanggal ?><br><b>Kategori :</b> <?php echo $berita->nama_jenis_berita ?><br></small><br>
                        <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita)?>" class="btn btn-success" title="Edit Berita">
                        <i class="fa fa-edit"> Edit Berita</i></a>
                        <?php
                            include('berita/delete.php');
                        ?></p>
                        </td>
                      </tr>
                      <?php } ?>
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
