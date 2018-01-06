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
                                    <form action="<?php echo base_url('admin/client/edit/'.$client['client_id']) ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Client Name</label>
                                                    <input type="text" name="client_name" class="form-control" value="<?php echo $client['client_name'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Link Website</label>
                                                    <input type="text" name="website" class="form-control" value="<?php echo $client['website'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status</label>
                                                    <select name="status" class="form-control">
                                                      <option value="publish" 
                                                      <?php if($client['status']=="publish") { echo "selected"; } ?>
                                                      >Publish</option>}
                                                      <option value="draft" 
                                                      <?php if($client['status']=="draft") { echo "selected"; } ?>
                                                      >Draft</option>}                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="control-label">Upload Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                    <div class="imagePreview"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$client['image']) ?>" width="458px" height="355px"></div>
                                                </div>
                                                <div class="form-group">
                                            </div>
                                        </div>   
                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                        <a class="btn btn-danger" href="<?php echo base_url('admin/client/');?>">&nbsp;Cancel</a>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>