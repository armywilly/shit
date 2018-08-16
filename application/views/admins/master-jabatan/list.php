    

    <div class="wrapper">    
        <div class="container">
                <!-- Custom Modals -->
            <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Master Jabatan</h4>
                    </div>
                </div>    

                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <button id="addToTable" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Tambah Data <i class="fa fa-plus"></i></button>
                                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Tambah Data Jabatan Baru</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('admins/master_jabatan/create') ?>" method="post" enctype="multipart/form-data">
                                                      

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="field-1" class="control-label">Jabatan</label>
                                                                    <input type="text" class="form-control" name="jabatan" class="form-control" value="<?php echo set_value('jabatan') ?>" placeholder="Jabatan">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="field-2" class="control-label">Keterangan</label>
                                                                    <textarea type="text" name="isi" class="form-control" placeholder="Keterangan"><?php echo set_value('isi') ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                            <input type="submit" name="submit" value="Submit" class="btn btn-info">
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal -->
                                    </div>
                                </div>
                            </div>

                            <table id="convert" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jabatan</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $i=1; foreach($mj as $list) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo substr(strip_tags($list['jabatan']),0,20) ?></td>
                                        <td><?php echo substr(strip_tags($list['isi']),0,100) ?></td>
                                        <td class="actions">
                                            <a href="<?php echo base_url('admins/master_jabatan/edit/'.$list['id_jabatan']);?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo base_url('admins/master_jabatan/delete/'.$list['id_jabatan']);?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php $i++; } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->