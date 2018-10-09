 <div id="left" class="bg-dark darker">
          <h3><center> Info </center></h3>
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
          </div>
          <div class="user-wrapper bg-dark">

            <a class="user-link" href="#">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo base_url('/assets/admin/user/upload/image/thumbs/'.$user_sign->gambar) ?>" width="210">
            </a>
            <div class="media-body">
              <h5 class="media-heading"><?php echo $user_sign->nama_user; ?></h5>
              <ul class="list-unstyled user-info">
                <li> Hak akses : <?php echo $user_sign->level; ?></li>
                <li><small>Member Since :
                    <i class="fa fa-calendar"></i>&nbsp;<?php echo substr($user_sign->tanggal_buat,0,10); ?></small>
                </li>
                <li>
                </br>
                  <a href="<?php echo base_url('admin/user/profile/'.$user_sign->id_user) ?>" class="btn btn-metis-5"><i class="fa fa-gear"></i> Profile Setting</a>
                  <a href="<?php echo site_url('admin/c_admin/logout'); ?>" class="btn btn-danger"><i class="fa fa-power-off"></i> Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
<!-- #menu -->
<div >
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header"><center>Menu</center></li>

          <li >
            <a href="<?php echo base_url('/admin/c_admin') ?>">
              <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-street-view"></i>
              <span class="link-title">
              Berita
            </span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="<?php echo base_url('/admin/berita/tambah') ?>">
                  <i class="fa fa-angle-right fa-circle-o"></i>&nbsp;Tambah Berita</a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/berita/laporan_saya/'.$user_sign->id_user)?>">
                  <i class="fa fa-angle-right fa-circle-o"></i>&nbsp;Berita saya</a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/berita/draft_saya/'.$user_sign->id_user)?>">
                  <i class="fa fa-angle-right fa-circle-o"></i>&nbsp;Draft</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span class="link-title">
              Administrator
            </span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="<?php echo base_url('/admin/about') ?>">
                  <i class="fa fa-angle-right fa-circle-o"></i>&nbsp;Halaman About Perusahaan</a>
              </li>
              <li>
                <a href="<?php echo base_url('/admin/visimisi') ?>">
                  <i class="fa fa-angle-right fa-circle-o"></i>&nbsp;Halaman Visi Misi</a>
              </li>
              <li>
                <a href="<?php echo base_url('/admin/jenis_berita') ?>">
                  <i class="fa fa-angle-right fa-circle-o"></i>&nbsp;Kategori Berita</a>
              </li>
              <li>
                <a href="<?php echo base_url('/admin/user') ?>">
                  <i class="fa fa-angle-right fa-circle-o"></i>&nbsp;User</a>
              </li>
            </ul>
          </li>
        </ul><!-- /#menu -->
</div>
      </div><!-- /#left -->
