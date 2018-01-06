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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Upload File</h4>
                                    <p class="category">Type file must be PDF,DOCS,XLS</p>
                                </div>
                                <div class="card-content">
                                    <form action="<?php echo base_url('admin/downloads/upload') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">File Name</label>
                                                    <input type="text" name="file_name" class="form-control" value="<?php echo set_value('file_name') ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="publish">Publish</option>               
                                                        <option value="draft">Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary">Choose File</button>
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> Keterangan</label>
                                                        <textarea name="file_description" class="form-control" rows="5"><?php echo set_value('file_description') ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">cloud_upload</i>&nbsp;&nbsp;Upload File</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>