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
                                    <h4 class="title">Practice Areas</h4>
                                    <p class="category">List Practice Areas</p>
                                    <a href="<?php echo base_url('admin/products/create') ?>" class="btn btn-info"><i class="material-icons">add_circle_outline</i>&nbsp;Create Practice Areas</a>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Date Upload</th>
                                            <th>Upload By</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($products as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo substr(strip_tags($list['product_name']),0,20) ?></td>
                                                <td><?php echo date('l, d/m/Y', strtotime($list['date'])); ?></td>
                                                <td><?php echo $list['username'] ?></td>
                                                <td class="td-actions text-right">
                                                            <a type="button" rel="tooltip" title="Read Task" class="btn btn-info btn-simple btn-xs" href="<?php echo base_url('produk/detil/'.$list['slug_product']) ?>">
                                                            <i class="material-icons">visibility</i>
                                                            </a>
                                                            <a href="<?php echo base_url('admin/products/edit/'.$list['product_id']);?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                            <a href="<?php echo base_url('admin/products/delete/'.$list['product_id']) ?>" type="button" rel="tooltip" title="Delete Task" class="btn btn-danger btn-simple btn-xs">
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