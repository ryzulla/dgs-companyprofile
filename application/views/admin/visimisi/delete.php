<button class="btn btn-danger btn" data-toggle="modal" data-target="#myModal<?php echo $about->id_about ?>" title="Delete User">
                              <i class="fa fa-trash-o"></i>
                            </button>
                            <div class="modal fade" id="myModal<?php echo $about->id_about ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <a href="<?php echo base_url('admin/jenis_berita/delete/'.$about->id_about) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, Hapus data ini!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
