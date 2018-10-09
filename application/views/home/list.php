<style>
.kiri{
    float: left !important;
    min-height:700px;
}
</style>
 <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(<?php echo base_url() ?>assets/front/images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Selamat Datang di PotretLayanan</h1>
                                    <h2 class="animation animated-item-2">Sampaikan pengaduan, saran, serta informasi mengenai pelayanan publik disekitar anda</h2>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url('auth'); ?>">Buat Laporan!</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?php echo base_url() ?>assets/front/images/slider/img1.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url() ?>assets/front/images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Amati dan Awasi</h1>
                                    <h2 class="animation animated-item-2">Pantau seluruh kegiatan terhadap pelayanan publik disekitar anda!</h2>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url('auth'); ?>">Lihat Laporan!</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?php echo base_url() ?>assets/front/images/slider/img2.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(<?php echo base_url() ?>assets/front/images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Bergabunglah!</h1>
                                    <h2 class="animation animated-item-2">Jadilah pelopor demi kemajuan Indonesia!</h2>
                                    <a class="btn-slide animation animated-item-3" href="<?php echo base_url('auth'); ?>">Gabung Sekarang!</a>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?php echo base_url() ?>assets/front/images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->
    <section id="recent-works">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Laporan Terbaru</h2>
                <hr>
            </div>
<div class="row" id="content">

            <?php foreach ($berita as $berita) { ?>
                <div class="col-lg-4 kiri">
                <table id="example1" class="table table-bordered table-striped">
                <tr>
                <td>
                    <h2><a href="<?php echo base_url('news/read/'.$berita->slug_berita) ?>" ?><?php echo character_limiter($berita->judul,60); ?></a></h2>
                </td></tr>
                <tr>
                <td>
                        <p><img height="200" width="100%" src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" alt="" ></p>
                </td>
                </tr>
                <tr>
                <td>
                        <?php
                            echo character_limiter($berita->isi,100);
                         ?>
                         <p><a href="<?php echo base_url('news/read/'.$berita->slug_berita) ?>" class="btn btn-success">Read More...</a></p>
                </td>
                </tr>
                <tr>
                <td>
                    <small><b>Lokasi : </b><?php echo $berita->lokasi; ?><small>
                </td></tr>
                <tr>
                <td>
                <small><b>Kategori :</b> <?php echo $berita->nama_jenis_berita.', <b>Jenis Layanan :</b> '.$berita->nama_kategori_berita; ?></small>
                </td>
                </tr>
                <tr>
                <td>
                <small><?php echo '<b>Author : </b>' .$berita->nama_user ?><br>
                <?php echo '<b>Tanggal : </b>' .$berita->tanggal ?></small>
                <?php if($berita->nama_jenis_berita!="Informasi"){ 
                		if($berita->tindak_lanjut=="Belum diproses"){?>
                         <br><small><b>Tindak Lanjut Laporan : </b><span class="btn btn-warning btn-xs btn-line"><?php echo $berita->tindak_lanjut ?></span></small><?php }else{ ?>
                         <br><small><b>Tindak Lanjut Laporan : </b><span class="btn btn-info btn-xs btn-line"><?php echo $berita->tindak_lanjut ?></span></small>
                         <?php } }?>
                </td>
                </tr>
                </table>
                </div>
                <?php } ?> 
                </div><!--/.row--> 
                <div class="col-lg-12 text-center">
                    <a href="<?php echo base_url('news'); ?>" class="btn btn-primary btn-lg"><i class="fa fa-newspaper-o"></i> See more news..</a>
            </div>
            
        </div><!--/.container-->
    </section><!--/#recent-works-->
<section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Fitur apa yang kami sediakan ?</h2><p class="lead">
                Fitur yang kami sediakan semua yang anda butuhkan terhadap kemajuan pelayanan yang ada di negara kita yaitu <br>Negara Kesatuan Republik INDONESIA</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-bullhorn"></i>
                            <h2>Pengaduan</h2>
                            <h3>Anda dapat menyampaikan pengaduan terhadap pelayanan disekitar anda</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2>Saran</h2>
                            <h3>Anda dapat menyampaikan saran/pendapat terhadap pelayanan disekitar anda</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud-download"></i>
                            <h2>Informasi</h2>
                            <h3>Anda dapat menyampaikan informasi terhadap pelayanan di sekitar anda</h3>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-leaf"></i>
                            <h2>Demokrasi</h2>
                            <h3>Anda memiliki hak bebas berpendapat terhadap pelayanan disekitar anda</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cogs"></i>
                            <h2>Jenis Layanan</h2>
                            <h3>Anda dapat memilih jenis layanan yang tersedia</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-heart"></i>
                            <h2>Dukung dan Sebarkan</h2>
                            <h3>Anda dapat mendukung dan menyebarkan semua laporan yang tersedia</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->
