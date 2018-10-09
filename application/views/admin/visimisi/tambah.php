<button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>  Tambah Data </button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Tambah Kategori Berita</h4>
</div>
<div class="modal-body">
<?php
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open(base_url('admin/About'));
?>
<div class="col-md-12">
<div class="form-group">
<textarea name="isi_about" class="form-control"><?php echo set_value('isi_about') ?></textarea>
</div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
	<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>
</div>
<?php echo form_close(); ?>
<div class="clearfix"></div>
    </div>

    </div>
</div>
</div>
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
