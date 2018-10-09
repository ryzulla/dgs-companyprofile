<?php
                         $id_user=$this->session->userdata('id_user');
                         $user_sign=$this->User_model->detail($id_user);
                        ?>
<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>PT. DWI GUNA SENTOSA</title>
      <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/template/Bootstrap-Admin-Template-master/dist/assets/css/main.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/template/Bootstrap-Admin-Template-master/dist/assets/css/style-switcher.css') ?>">


    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url('assets/admin/template/Bootstrap-Admin-Template-master/dist/assets/less/theme.less') ?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script>

    <!--Modernizr-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
