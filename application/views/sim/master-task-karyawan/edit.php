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
                        <h4 class="page-title">Edit Data Task</h4>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                                <form action="<?php echo base_url('sim/master_task_karyawan/edit/'.$mt['id_master_task']);?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Task</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="task" class="form-control" value="<?php echo $mt['task']; ?>" placeholder="Task" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Keterangan</label>
                                                <div class="col-md-10">
                                                    <textarea id="tools_editor" name="isi_task" class="form-control" placeholder="Keterangan" required><?php echo $mt['isi_task'] ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Waktu Mulai</label>
                                                <div class="col-md-10">
                                                    <input type="date" name="tgl_mulai" class="form-control" rel="tooltip" placeholder="waktu Mulai" value="<?php echo $mt['tgl_mulai'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" style="text-align: left;">Waktu Selesai</label>
                                                <div class="col-md-10">
                                                    <input type="date" name="tgl_berakhir" class="form-control" rel="tooltip" placeholder="waktu Selesai" value="<?php echo $mt['tgl_berakhir'] ?>" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="<?php echo base_url('sim/master_task_karyawan') ?>" type="button"
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