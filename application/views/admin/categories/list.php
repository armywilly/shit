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
                                    <h4 class="title">Category</h4>
                                    <p class="category">List Categories</p>
                                    <button data-target="#tambah" data-toggle="modal" class="btn btn-info"><i class="material-icons">add_circle_outline</i>&nbsp;Create Category</button>
                                </div>

                                <!-- Modal View Tambah category -->
                                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Create Category</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form action="<?php echo base_url('admin/blog/categories/') ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Category Name</label>
                                                            <input name="category_name" type="text" autofocus required class="form-control" value="<?php echo set_value('category_name') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Urutan</label>
                                                            <input name="order_category" type="number" autofocus required class="form-control" value="<?php echo set_value('order_category') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Short Description</label>
                                                            <textarea name="category_description" rows="5" class="form-control"><?php echo set_value('category_description') ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>           
                                                <div class="form-group">
                                                      <input type="submit" name="submit" value="Save" class="btn btn-primary btn-md">
                                                    <input type="reset" name="reset" value="Reset" class="btn btn-default btn-md">
                                                </div>
                                              </form>
                                          </div>
                                      </div>
                                    </div>
                                    </div>

                                    <!-- List Table category -->
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Order</th>
                                            <th>Description</th>
                                            <th>Upload By</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($categories as $list) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $list['category_name'] ?></td>
                                                <td><?php echo $list['order_category'] ?></td>
                                                <td><?php echo $list['category_description'] ?></td>
                                                <td><?php echo $list['status'] ?></td>
                                                <td class="td-actions text-right">
                                                            <button data-target="#edit" data-toggle="modal" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">edit</i>
                                                            </button>
                                                            <a href="<?php echo base_url('admin/blog/delete_category/'.$list['category_id']);?>" type="button" rel="tooltip" title="Delete Task" class="btn btn-danger btn-simple btn-xs">
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

            <!-- Modal Edit category -->
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form action="<?php echo base_url('admin/blog/edit_category/'.$list['category_id']) ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Category Name</label>
                                                            <input name="category_name" type="text" autofocus required class="form-control" placeholder="Category Name"  value="<?php echo $list['category_name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Urutan</label>
                                                            <input name="order_category" type="number" autofocus required class="form-control" placeholder="Order Category"  value="<?php echo $list['order_category'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Short Description</label>
                                                            <textarea name="category_description" rows="5" class="form-control" placeholder="Description"><?php echo $list['category_description'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>           
                                                <div class="form-group">
                                                      <input type="submit" name="submit" value="Save" class="btn btn-primary btn-md">
                                                    <input type="reset" name="reset" value="Reset" class="btn btn-default btn-md">
                                                </div>
                                              </form>
                                          </div>
                                      </div>
                                    </div>
                                    </div>