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
                        <h4 class="page-title">Input Data Partnership Agreement</h4>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                                <form action="<?php echo base_url('admins/partnership_ag/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">No Registrasi Partnership Agreement</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="no_pa" class="form-control" value="<?php echo $kd['no_pa']; ?>" placeholder="Nama Registrasi Partnership Agreement" disabled>
                                                </div>
                                            </div>

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
                                                <label class="col-md-2 control-label" style="text-align: left;">Nama Klien</label>
                                                <div class="col-md-10">
                                                    <select name="lead" class="form-control" required>
                                                            <?php foreach($k as $list) { ?>
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="<?php echo $list['id_staff'] ?>">
                                                                <?php echo $list['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" style="text-align: left;">Pilih Team 1</label>
                                                        <div class="col-md-8">
                                                        <select name="team_1" class="form-control" required>
                                                            <?php foreach($k as $list) { ?>
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="<?php echo $list['id_staff'] ?>">
                                                                <?php echo $list['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" style="text-align: left;">Pilih Team 2</label>
                                                        <div class="col-md-8">
                                                        <select name="team_2" class="form-control" required>
                                                            <?php foreach($k as $list) { ?>
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="<?php echo $list['id_staff'] ?>">
                                                                <?php echo $list['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" style="text-align: left;">Pilih Team 3</label>
                                                        <div class="col-md-8">
                                                        <select name="team_3" class="form-control" required>
                                                            <?php foreach($k as $list) { ?>
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="<?php echo $list['id_staff'] ?>">
                                                                <?php echo $list['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                                        </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" style="text-align: left;">Pilih Team 4</label>
                                                        <div class="col-md-8">
                                                        <select name="team_4" class="form-control" required>
                                                            <?php foreach($k as $list) { ?>
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="<?php echo $list['id_staff'] ?>">
                                                                <?php echo $list['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" style="text-align: left;">Pilih Team 5</label>
                                                        <div class="col-md-8">
                                                        <select name="team_5" class="form-control" required>
                                                            <?php foreach($k as $list) { ?>
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="<?php echo $list['id_staff'] ?>">
                                                                <?php echo $list['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" style="text-align: left;">Pilih Team 6</label>
                                                        <div class="col-md-8">
                                                        <select name="team_6" class="form-control" required>
                                                            <?php foreach($k as $list) { ?>
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="<?php echo $list['id_staff'] ?>">
                                                                <?php echo $list['nama'] ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                                        </div>
                                                </div>

                                            </div>

                                            

                                            

                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="<?php echo base_url('admins/partnership_ag') ?>" type="button"
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