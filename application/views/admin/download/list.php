<?php
// Session 
if($this->session->flashdata('sukses')) { 
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">File</h4>
                                    <p class="category">Caution! This table are list of file that uploaded</p>
                                    <a href="<?php echo base_url('admin/downloads/upload') ?>" class="btn btn-warning"><i class="material-icons">cloud_upload</i>&nbsp;Upload File</a>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>File Name</th>
                                            <th>Link</th>
                                            <th>Date</th>
                                            <th>Upload By</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($downloads as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo substr(strip_tags($list['file_name']),0,20) ?></td>
                                                <td><a href="<?php echo $list['file'] ?>">Downloads</a></td>
                                                <td><?php echo date('l, d/m/Y', strtotime($list['date_upload'])); ?></td>
                                                <td><?php echo $list['status'] ?></td>
                                                <td class="td-actions text-right">
                                                            <a href="<?php echo base_url('admin/downloads/edit/'.$list['download_id']);?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                            <a href="<?php echo base_url('admin/downloads/delete/'.$list['download_id']);?>" type="button" rel="tooltip" title="Delete Task" class="btn btn-danger btn-simple btn-xs">
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