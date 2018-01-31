   

    <div class="wrapper">    
        <div class="container">
                <!-- Custom Modals -->
            <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Master Task</h4>
                    </div>
                </div>    

                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <a href="<?php echo base_url('sim/master_task_karyawan/create') ?>" type="button" class="btn btn-success waves-effect waves-light">Tambah Data <i class="fa fa-plus"></i></a>
                                        </div>
                                </div>
                            </div>

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Task</th>
                                        <th>Keterangan</th>
                                        <th>Mulai</th>
                                        <th>Berakhir</th>
                                        <th width="120">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $i=1; foreach($mt as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo substr(strip_tags($list['task']),0,20) ?></td>
                                                <td><?php echo substr(strip_tags($list['isi_task']),0,100) ?></td>
                                                <td><?php echo date('l, d/m/Y', strtotime($list['tgl_mulai'])); ?></td>
                                                <td><?php echo date('l, d/m/Y', strtotime($list['tgl_berakhir'])); ?></td>
                                                <td class="actions">
                                                    <a href="<?php echo base_url('sim/master_task_karyawan/detil/'.$list['id_master_task']);?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo base_url('sim/master_task_karyawan/edit/'.$list['id_master_task']);?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?php echo base_url('sim/master_task_karyawan/delete/'.$list['id_master_task']);?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->