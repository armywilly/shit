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
                                    <h4 class="title">Inbox</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>Sender</th>
                                            <th width="300px">Message</th>
                                            <th>Email</th>
                                            <th>Data Sender</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($contacts as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo substr(strip_tags($list['name']),0,20) ?></td>
                                                <td><?php echo substr(strip_tags($list['messages']),0,70) ?></td>
                                                <td class="text-primary"><?php echo substr(strip_tags($list['email']),0,20) ?></td>
                                                <td><?php echo date('l, d/m/Y', strtotime($list['date'])); ?></td>
                                                <td class="td-actions text-right">
                                                    
                                                            <a href="<?php echo base_url('admin/contacts/delete/'.$list['message_id']);?>" type="button" rel="tooltip" title="Delete Task" class="btn btn-danger btn-simple btn-xs">
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