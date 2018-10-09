<div id="content">


        <div class="outer">
          <div class="inner bg-light lter">
<div class="main-bar">
            <h3>
              <i class="fa fa-columns"></i>&nbsp;Konten Visi Misi Perusahaan</h3>
          </div>
          <?php
          if($this->session->flashdata('sukses')){
              echo '<div class="alert alert-success">';
              echo $this->session->flashdata('sukses');
              echo '</div>';
          }
          ?>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-bookmark-o"></i>
                    </div>
                    <h5>Isi Konten Visi Misi Perusahaan </h5>
                  </header>
                  <div id="collapse4" class="body">

                      <div class="row">
                        <?php $i=1; foreach($visimisi as $visimisi){ ?>
                          <div class="col-lg-12" align="right" style="margin-bottom:20px;">
                            <a href="<?php echo base_url('admin/visimisi/edit/'.$visimisi->id_visimisi)?>" class="btn btn-success" title="Edit User">
                            <i class="fa fa-edit"></i> Ubah Visi Misi Perusahaan</a>
                          </div>
                        <div class="col-lg-12" style="margin-bottom:20px;">
                            <label>VISI Perusahaan</label>
                          <textarea name="visi" class="form-control" readonly><?php echo $visimisi->visi ?></textarea>
                        </div>

                        <div class="col-lg-12">
                          <label>MISI Perusahaan</label>
                          <textarea name="misi" class="form-control" readonly><?php echo $visimisi->misi ?></textarea>
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
            	height: 250,
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
