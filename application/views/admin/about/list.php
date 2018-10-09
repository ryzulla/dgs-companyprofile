<div id="content">


        <div class="outer">
          <div class="inner bg-light lter">
<div class="main-bar">
            <h3>
              <i class="fa fa-columns"></i>&nbsp;Konten About Perusahaan</h3>
          </div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-bookmark-o"></i>
                    </div>
                    <h5>Isi Konten About Perusahaan </h5>
                  </header>
                  <div id="collapse4" class="body">
                    <?php
                    if($this->session->flashdata('sukses')){
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                    ?>
                      <div class="row">
                        <?php $i=1; foreach($about as $about){ ?>
                          <div class="col-lg-12" align="right" style="margin-bottom:20px;">
                            <a href="<?php echo base_url('admin/about/edit/'.$about->id_about)?>" class="btn btn-success" title="Edit User">
                            <i class="fa fa-edit"></i> Ubah Konten About Perusahaan</a>
                          </div>
                        <div class="col-lg-12">
                          <textarea name="isi_about" class="form-control" readonly><?php echo $about->isi_about ?></textarea>
                        </div>

                          <?php $i++; } ?>
                      </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
            </div><!-- /#content -->
            <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
            <script>tinymce.init({
            	selector: 'textarea',
            	height: 400,
            	theme: 'modern',
              readonly : 1,
            	plugins: [
            		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            		'searchreplace wordcount visualblocks visualchars code fullscreen',
            		'insertdatetime media nonbreaking save table contextmenu directionality',
            		'template paste textcolor colorpicker textpattern imagetools'
            	],
            	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            	toolbar2: 'print preview media | forecolor backcolor',
            	image_advtab: true,
            	templates: [
            		{ title: 'Test template 1', content: 'Test 1' },
            		{ title: 'Test template 2', content: 'Test 2' }
            	],
            	content_css: [
            		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            		'//www.tinymce.com/css/codepen.min.css'
            	]
             });</script>
