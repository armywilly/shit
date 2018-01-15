<?php
// Session 
if($this->session->flashdata('sukses')) { 
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
} 

// File upload error
if(isset($error)) {
    echo '<div class="alert alert-success">';
    echo $error;
    echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Create Data Client</h4>
                                </div>
                                <div class="card-content">
                                    <form action="<?php echo base_url('admin/client/create') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Category Name</label>
                                                    <input type="text" name="category_name" class="form-control" value="<?php echo set_value('category_name') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Order</label>
                                                    <input type="number" name="order_category" class="form-control" value="<?php echo set_value('order_category') ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Description</label>
                                                    <input type="text" name="category_description" rows="5" class="form-control" value="<?php echo set_value('category_description') ?>" required>
                                                </div>
                                            </div>
                                        </div>  
                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                        <input type="cancel" name="cancel" class="btn btn-danger" value="Cancel">
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>