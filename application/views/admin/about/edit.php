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
                    <i class="glyphicon glyphicon-pencil"></i>
                    </div>
                    <h5>Edit Konten About Perusahaan </h5>
                  	</header>
                  	<?php
					echo validation_errors('<div class="alert alert-warning">','</div>');
					echo form_open(base_url('admin/about/edit/'.$about->id_about));
					?>
					<div class="col-md-12">
            <br>
					<div class="form-group">
					<textarea name="isi_about" class="form-control" ><?php echo $about->isi_about ?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
						<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
					</div>
					</div>

					<?php form_close()?>

                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->

          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
      <script>tinymce.init({
      	selector: 'textarea',
      	height: 500,
      	theme: 'modern',
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
