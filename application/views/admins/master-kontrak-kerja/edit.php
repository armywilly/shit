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
                        <h4 class="page-title">Input Data Kontrak Kerja Sama</h4>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                                <form action="<?php echo base_url('sim/master_kontrak_kerja/edit/'.$mkk['id_master_kk']) ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No Registrasi Kontrak</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="nr_k" class="form-control" value="<?php echo $mkk['nr_k']; ?>" placeholder="Nama Registrasi Kontrak" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No Kontrak</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="no_kontrak" class="form-control" value="<?php echo $mkk['no_kontrak'] ?>" placeholder="No Kontrak" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No Partnership Agreement</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="no_pa" class="form-control" value="<?php echo $mkk['no_pa'] ?>" placeholder="No Partnership Agreement" disabled>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Nama Klien</label>
                                                <div class="col-md-10">
                                                    <select name="id_master_client" class="form-control" required>
                                                            <?php foreach($mc as $list) { ?>
                                                        <option value="<?php echo $list['id_master_client'] ?>" <?php if($mkk['id_master_client']==$list['id_master_client']) { echo "selected"; } ?>>
                                                            <?php echo $list['nama_client'] ?>
                                                        </option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Permasalah/Lingkup Pekerjaan</label>
                                                <div class="col-md-10">
                                                    <textarea id="tools_editor" name="probs" rows="7" class="form-control"><?php echo $mkk['probs'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Tanggal Kontrak</label>
                                                <div class="col-md-10">
                                                    <input type="date"  name="tgl_kontrak" class="form-control" value="<?php echo $mkk['tgl_kontrak'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Tanggal Mulai Kontrak</label>
                                                <div class="col-md-10">
                                                    <input type="date"  name="start" class="form-control" value="<?php echo $mkk['start'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Tanggal Berakhir Kontrak</label>
                                                <div class="col-md-10">
                                                    <input type="date" name="due" class="form-control" value="<?php echo $mkk['due'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Status Kontrak</label>
                                                <div class="col-md-10">
                                                    <select name="stts_kontrak" class="form-control">
                                                        <option value="On Going" <?php if($mkk['stts_kontrak']=="On Going") { echo "selected"; } ?>>On going</option>
                                                        <option value="Complete" <?php if($mkk['stts_kontrak']=="Complete") { echo "selected"; } ?>>Complete</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Upload File</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="file" class="dropify" data-max-file-size="20M" data-default-file="<?php echo base_url('./upload/klien/file/'.$mkk['file']) ?>"/>
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