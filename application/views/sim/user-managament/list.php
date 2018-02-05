   

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
                                        <a href="<?php echo base_url('sim/user_managament/create') ?>" type="button" class="btn btn-success waves-effect waves-light">Tambah Data <i class="fa fa-plus"></i></a>
                                        <a href="<?php echo base_url('sim/permission/editPermission') ?>" type="button" class="btn btn-warning waves-effect waves-light">Set Permission <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                                                    <a href="" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <a href="" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->