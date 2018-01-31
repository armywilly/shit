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
                        <h4 class="page-title">Edit Data Jabatan</h4>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                                <form action="<?php echo base_url('sim/master_jabatan/edit/'.$mj['id_jabatan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Nama Lengkap</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="jabatan" class="form-control" value="<?php echo $mj['jabatan'] ?>" placeholder="Jabatan" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Nama Lengkap</label>
                                                <div class="col-md-10">
                                                    <textarea type="text" name="isi" class="form-control" placeholder="Keterangan"><?php echo $mj['isi'] ?></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="<?php echo base_url('sim/master_jabatan') ?>" type="button"
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