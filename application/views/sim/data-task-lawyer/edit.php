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


    <div class="wrapper">    
        <div class="container">
            <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Input Data Task</h4>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                                <form action="<?php echo base_url('sim/data_task_lawyer/edit/'.$dt['id_task']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Task</label>
                                                <div class="col-md-10">
                                                    <select name="id_master_task" class="form-control">
                                                        <?php foreach($mt as $t) { ?>
                                                        <option value="<?php echo $t['id_master_task'] ?>" <?php if($dt['id_master_task']==$t['id_master_task']) { echo "selected"; } ?>>
                                                            <?php echo $t['task'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Select Team</label>
                                                <div class="col-md-10">
                                                    <select class="select2 select2-multiple" multiple name="id_staff">
                                                        <?php foreach($k as $k) { ?>
                                                        <option value="<?php echo $k['id_staff'] ?>" <?php if($dt['id_staff']==$k['id_staff']) { echo "selected"; } ?>>
                                                            <?php echo $k['nama'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="<?php echo base_url('sim/data_task_lawyer') ?>" type="button"
                                                    class="btn btn-danger waves-effect">Cancel
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>