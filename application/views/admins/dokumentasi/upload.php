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
                        <h4 class="page-title">Upload File Dokumentasi</h4>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                                <form action="<?php echo base_url('sim/dokumentasi_client/upload') ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Nama Klien</label>
                                                <div class="col-md-10">
                                                    <select name="id_master_client" class="form-control" required>
                                                            <?php foreach($mc as $list) { ?>
                                                            <option value="<?php echo $list['id_master_client'] ?>">
                                                                <?php echo $list['nama_client'] ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Upload File</label>
                                                <div class="col-md-10">
                                                    <input type="file" value="<?php echo set_value('file') ?>" name="file" class="dropify" data-max-file-size="20M"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Keterangan</label>
                                                <div class="col-md-10">
                                                    <textarea id="tools_editor" name="keterangan" rows="7" class="form-control"><?php echo set_value('keterangan') ?></textarea>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="<?php echo base_url('sim/master_kontrak_kerja') ?>" type="button"
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