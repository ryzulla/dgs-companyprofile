</head>
  <body class="">
    <div class="bg-dark dk" id="wrap">
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid" style="padding:25px;">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">

              <a class="navbar-brand" href="<?php echo base_url() ?>"><h2 style="color:white;">PT. DWI GUNA SENTOSA</h2></a>
            </header>
            <div class="topnav">
              <div class="btn-group">
              <a data-toggle="" data-original-title="Waktu" data-placement="bottom" class="btn btn-default btn-sm">
                  <i class="glyphicon glyphicon-calendar"></i>
                <?php
                date_default_timezone_set("Asia/Jakarta");
                echo date("d M y"); ?> <i class="glyphicon glyphicon-time"></i> <span id="clock"></span>
                </a>
                </a>
              </div>
              <div class="btn-group">
                <a  href="<?php echo site_url('admin/c_admin/logout'); ?>" data-toggle="tooltip" data-original-title="Logout (<?php echo $user_sign->nama_user; ?>)" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a>
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Tampilkan / Sembunyikan Fitur" data-toggle="tooltip" class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                  <i class="fa fa-bars"></i>
                </a>
            </div>

            </div>

        </nav><!-- /.navbar -->
      </div>
      <!-- /#top -->
