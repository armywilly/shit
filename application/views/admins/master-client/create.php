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
                                <form action="<?php echo base_url('admins/master_client/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Nama Klien</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="nama_client" class="form-control" value="<?php echo set_value('nama_client') ?>" placeholder="Nama Klien" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No Registrasi Klien</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="nrk" class="form-control" value="<?php echo $kd['nrk']; ?>" placeholder="Nama Registrasi Klien" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No NPWP Klien</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="npwp_client" class="form-control" value="<?php echo set_value('npwp_client') ?>" placeholder="No NPWP Klien" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Person In Charge</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="pic" class="form-control" value="<?php echo set_value('pic') ?>" placeholder="Person In Charge" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Alamat Klien</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="alamat_client" class="form-control" value="<?php echo set_value('alamat_client') ?>" placeholder="Alamat Klien" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No Telpon Klien</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="no_telp_client" class="form-control" value="<?php echo set_value('no_telp_client') ?>" placeholder="No Telpon Klien" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No Fax Klien</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="no_fax_client" class="form-control" value="<?php echo set_value('no_fax_client') ?>" placeholder="No Fax Klien" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Email Klien</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="email_client" class="form-control" value="<?php echo set_value('email_client') ?>" placeholder="Email Klien" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Upload Foto / Logo Klien</label>
                                                <div class="col-md-10">
                                                    <input type="file" value="<?php echo set_value('image') ?>" name="image" class="dropify" data-max-file-size="1M"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">File Pendukung(Optional)</label>
                                                <div class="col-md-10">
                                                    <input type="file" value="<?php echo set_value('file_1') ?>" name="file_1" class="dropify" data-max-file-size="20M"/>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="<?php echo base_url('admins/master_client') ?>" type="button"
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