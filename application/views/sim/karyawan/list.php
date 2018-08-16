        <?php
// Session 
if($this->session->flashdata('sukses')) {
    echo '<div class="col-md-6 pull-left">';
    echo '<div class="alert alert-info alert-with-icon" data-notify="container">';
    echo '<i data-notify="icon" class="material-icons">add_alert</i>';
    echo $this->session->flashdata('sukses');
    echo '</div>';
    echo '</div>';
} 
// Error
echo validation_errors('<div class="col-md-6 pull-left">','<div class="alert alert-danger alert-with-icon" data-notify="container">','<i data-notify="icon" class="material-icons">add_alert</i>','</div>','</div>'); 
?>
<div class="wrapper">
        <div class="container">

            <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Karyawan</h4>
                    </div>
                </div>

            <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <a href="<?php echo base_url('sim/karyawan/create') ?>" type="button" class="btn btn-success waves-effect waves-light">Tambah Data <i class="fa fa-plus"></i></a>
                                        </div>
                                </div>
                            </div>

                            <table id="convert" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>No Induk Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th width="120">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $i=1; foreach($k as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo substr(strip_tags($list['nama']),0,25) ?></td>
                                                <td><?php echo $list['nip'] ?></td>
                                                <td><?php echo $list['jabatan'] ?></td>
                                                <td><?php echo $list['email'] ?></td>
                                                <td class="actions">
                                                    <a href="<?php echo base_url('sim/karyawan/detail/'.$list['id_staff']);?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo base_url('sim/karyawan/edit/'.$list['id_staff']);?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?php echo base_url('sim/karyawan/delete/'.$list['id_staff']);?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

        </div> <!-- End Cont -->