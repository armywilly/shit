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
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Data Task Lawyer</h4>
                                    <p class="category">List Data Task Lawyer</p>
                                    <a href="<?php echo base_url('sim/data_task_lawyer/create') ?>" class="btn btn-info"><i class="material-icons">add_circle_outline</i>&nbsp;Create New Data</a>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>Team</th>
                                            <th>Task</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($dt as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $list['id_staff']; ?></td>
                                                <td><a href="<?php echo base_url('sim/master_task_karyawan') ?>"><?php echo $list['id_master_task']; ?></a></td>
                                                <td class="td-actions text-right">
                                                            <a href="<?php echo base_url('sim/data_task_lawyer/edit/'.$list['id_task']);?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                            <a href="<?php echo base_url('sim/data_task_lawyer/delete/'.$list['id_task']);?>" type="button" rel="tooltip" title="Delete Task" class="btn btn-danger btn-simple btn-xs">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>