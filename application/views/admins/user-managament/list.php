   

    <div class="wrapper">    
        <div class="container">
                <!-- Custom Modals -->
            <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">User Managaments</h4>
                    </div>
                </div>    

                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <a href="<?php echo base_url('admins/user_managament/add_user') ?>" type="button" class="btn btn-success waves-effect waves-light">Tambah User <i class="fa fa-plus"></i></a>
                                        <a href="<?php echo base_url('admins/permission/editPermission') ?>" type="button" class="btn btn-warning waves-effect waves-light">Atur Hak Akses <i class="fa fa-pencil"></i></a>
                                        <!-- Button Modal -->
                                        <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Tambah Role <i class="fa fa-plus"></i></button>

                                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Masukan Data Role Baru</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Role</label>
                                                                        <input type="text" class="form-control" id="field-1" placeholder="Role">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="field-2" class="control-label">Deskiripsi Role</label>
                                                                        <textarea type="text" class="form-control" id="field-2" placeholder="Deskiripsi Role"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-success waves-effect waves-light">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.modal -->
                                        <!-- Modal End -->

                                    </div>
                                </div>
                            </div>

                            <table id="convert" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $i=1; foreach($um as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $list->username ?></td>
                                                <td><?php echo $list->email ?></td>
                                                <td><?php echo $list->name ?></td>
                                                <td class="actions">
                                                    <a href="<?php echo base_url('admins/user_managament/delete_user/'.$list->id);?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->