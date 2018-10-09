<?php
if($this->session->userdata('level')=="User"){
  redirect('member/c_member');
}elseif($this->session->userdata('level')=="Admin"){
  redirect('admin/c_admin');
}else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page/Forgot Password</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/template/Bootstrap-Admin-Template-master/dist/assets/css/main.min.css') ?>">
  </head>
  <body class="login">
    <div class="form-signin">
      <div class="text-center" style="margin:0 auto">
        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/logo.png') ?>" style="width:50%;" alt=""></a><br>
        <small>PT Dwi Guna Sentosa</small>
      </div>
      <hr>
     <?php
      if($this->session->flashdata('sukses')){
          echo '<div class="alert alert-success">';
          echo $this->session->flashdata('sukses');
          echo '</div>';
      }elseif($this->session->flashdata('warning')){
                              echo '<div class="alert alert-warning">';
                              echo $this->session->flashdata('warning');
                              echo '</div>';

                          }
    ?>
      <div class="tab-content">
        <div id="login" class="tab-pane active">
         <?php echo form_open("auth/cek_login"); ?>
            <p class="text-muted text-center">
              Enter your username and password
            </p>
            <input type="email" name="email" placeholder="Email" class="form-control top" required>
            <input type="password" name="password" placeholder="Password" class="form-control bottom" required>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          <?php echo form_close(); ?>
        </div>
        <div id="forgot" class="tab-pane">
          <?php echo form_open('email'); ?>
            <p class="text-muted text-center">Enter your valid e-mail</p>
            <input type="email" name="email" placeholder="mail@domain.com" class="form-control" required>
            <br>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
          <?php echo form_close(); ?>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Login</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a>  </li>
        </ul>
      </div>
    </div>

    <!--jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      (function($) {
        $(document).ready(function() {
          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>
  </body>
</html>
<?php } ?>
