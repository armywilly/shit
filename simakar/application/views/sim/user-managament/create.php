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
                        <h4 class="page-title">Input Data Klien</h4>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                                <form action="<?php echo base_url('sim/user_managament/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Username</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?>" placeholder="Username" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Password</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="password" class="form-control" value="<?php echo set_value('password') ?>" placeholder="Password" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Email</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Email" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Role User</label>
                                                <div class="col-md-10">
                                                    <select name="role_id" value="<?php echo set_value('role_id') ?>" class="form-control">
                                                            <option value="1">Administrator</option>
                                                            <option value="2">Dokumentasi</option>
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
                                            <a href="<?php echo base_url('sim/master_client') ?>" type="button"
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