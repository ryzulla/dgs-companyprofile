<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
    <head>
        <!-- Basic Page Needs -->
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>Jasa Konstruksi || PT. DWI GUNA SENTOSA</title>
        <meta name="description" content="PT. Dwi Guna Swntosa adalah perusahan yang bergerak dibidang Konstruksi. Kami menyediakan layanan pembongkaran dan konstruksi bangunan.">
        <meta name="keywords" content="Jasa, Konstruksi, Pembongkaran, Bangunan, Perusahaan Konstruksi, DGS, PT Dwi Guna Sentosa">
        <meta name="author" content="raryanapriansyah@gmail.com">
        <meta name="robots" content="index,follow">
        <meta name="og:title" property="og:title" content="PT. DWI GUNA SENTOSA">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Theme style -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/stylesheet/style.css">

        <!-- Responsive -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/stylesheet/responsive.css">
    </head>
    <body>
        <div id="loading-overlay">
            <div class="loader"></div>
        </div> <!-- /.loading-overlay -->

        <div class="top">
            <div class="container container-header">
                <div class="row">
                  <div class="col-lg-8 col-sm-12">
                      <div class="flat-custom-info">
                          <ul class="custom-info">
                            <li class="datetime"><a href="#">Monday - Friday: 08 AM - 06 PM</a></li>
                            <li class="phone"><a href="#">(+62)21 2243 9921</a></li>
                            <li class="mail"><a href="#">dgsdwigunasentosa@gmail.com</a></li>
                          </ul>
                      </div><!-- /.custom-info -->
                  </div><!-- /.col-md-8 -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.Top -->

        <header id="header" class="style3" >
            <div class="container container-header">
                <div class="row" >
                    <div class="col-md-12" >
                        <div class="header-wrap style3 clearfix">
                            <div id="logo">
                                <a href="index.html"><img src="<?php echo base_url()?>assets/front/images/logo.png" alt="logo" width="80" height="15" data-retina="images/logo-2x.png" data-width="80" data-height="15"></a>
                            </div> <!-- /#logo -->

                            <div class="mobile-button">
                                <span></span>
                            </div>
                            <div class="nav-wrap">
                                <nav id="mainnav" class="mainnav">
                                    <ul class="menu">
                                        <li class="active">
                                            <a href="#" title="">HOME</a>
                                        </li>
                                        <li>
                                            <a href="#about" title="">ABOUT US</a>
                                        </li>
                                        <li>
                                            <a href="#services" title="">SERVICE</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">PROJECTS</a>

                                        </li>
                                        <li>
                                            <a href="#news" title="">News</a>

                                        </li>
                                        <li>
                                            <a href="#">CONTACT</a>
                                        </li>
                                    </ul><!-- /.menu -->
                                </nav> <!-- /#mainnav -->
                            </div> <!-- .nav-wrap -->
                        </div> <!-- /.header-wrap -->
                    </div>
                </div> <!-- /.row -->
            </div> <!-- container -->
        </header> <!-- /#header -->

        <div class="page-title parallax parallax1 ">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-title-content text-center">
                    <div class="page-title-heading ">
                        <h3 class="title"><a href="#">News</a></h3>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><a href="#">Home</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- /.page-title -->

        <div class="flat-row main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-wrap fix-float-box">
                          <?php
                           foreach ($berita as $berita) { ?>
                            <article class="post">
                                <div class="post-border">
                                    <div class="featured-post">
                                        <a href="<?php echo base_url()?>news/read/<?php echo $berita->slug_berita?>"><img src="<?php echo base_url()?>assets/upload/image/thumbs/<?php echo $berita->gambar ?>" alt="image"></a>
                                    </div>
                                    <div class="content-post">
                                        <h5 class="post-title">
                                            <a href="<?php echo base_url()?>news/read/<?php echo $berita->slug_berita?>"><?php echo $berita->judul ?></a>
                                        </h5>
                                        <div class="post-meta">
                                            <ul>
                                                <li class="time"><a href="#"><?php echo $berita->tanggal ?></a></li>
                                                <li class="categories"><a href="#"><?php echo $berita->nama_jenis_berita ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="post-content">
                                            <p><?php echo character_limiter($berita->isi,100); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                          <?php } ?>
                      </div>
                    </div>
                    <div class="pagination-wrap blog-pagination ">

                        <?php echo $this->pagination->create_links(); ?>

                    </div>
                </div>
            </div>
        </div> <!-- /.main-content -->



        <footer id="footer">
            <div class="footer-widgets pd-top-100 pd-bottom-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="widget widget-about">
                                <div id="logo-ft">
                                    <a href="#"><img src="<?php echo base_url()?>assets/front/images/logo.png" alt="logo-ft"  width="128" height="26" data-retina=".<?php echo base_url()?>assets/front//images/logo.png" data-width="128" data-height="26"></a>
                                </div>
                                <div class="copyright">
                                    <p class="text-widget pd-right-40">© <a href="#">PT. DWI GUNA SENTOSA</a> Construction 2018. All Right Reserved.</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                        <div class="widget widget-contact">
                          <h5><a href="#">(+62) 21-2243-9921</a></h5>
                          <h5><a href="#">(+62) 819-8679-73</a></h5>
                          <p class="text-widget">dgsdwigunasentosa@gmail.com</p>
                          <p class="text-widget pd-right-40" >Jl. Papanggo 3D No. 366 F</p>
                      </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer> <!-- /#footer -->

        <a id="scroll-top"></a> <!-- /#scroll-top -->

        <!-- Javascript -->
        <script src="<?php echo base_url()?>assets/front/javascript/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/javascript/plugins.js"></script>
        <script src="<?php echo base_url()?>assets/front/javascript/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/javascript/equalize.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/javascript/jquery-countTo.js"></script>
        <script src="<?php echo base_url()?>assets/front/javascript/owl.carousel.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/javascript/main.js"></script>

        <!-- Slider -->
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/javascript/rev-slider.js"></script>

        <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="<?php echo base_url()?>assets/front/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
    </body>
</html>
