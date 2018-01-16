<?php
// Session 
if($this->session->flashdata('sukses')) { 
    echo '<div class="col-md-6 pull-left">';
    echo '<div class="alert alert-info alert-with-icon" data-notify="container">';
    echo '<i data-notify="icon" class="material-icons">add_alert</i>';
    echo $this->session->flashdata('sukses');
    echo '</div>';
    echo '</div>';
} 

// File upload error
if(isset($error)) {
    echo '<div class="col-md-6 pull-left">';
    echo '<div class="alert alert-danger alert-with-icon" data-notify="container">';
    echo '<i data-notify="icon" class="material-icons">add_alert</i>';
    echo $error;
    echo '</div>';
    echo '</div>';
}

// Error
echo validation_errors('<div class="col-md-6 pull-left">','<div class="alert alert-danger alert-with-icon" data-notify="container">','<i data-notify="icon" class="material-icons">add_alert</i>','</div>','</div>');
?>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

<div class="content">
    <div class="container-fluid">
        <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Create Data Jabatan</h4>
                                </div>
                                <div class="card-content">
                                    <form action="<?php echo base_url('sim/master_task_karyawan/edit/'.$mt['id_master_task']);?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nama Jabatan</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $mt['name'] ?>">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-12 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Deskripsi Nama Jabatan</label>
                                                    <textarea type="text" name="isi" class="form-control" id="#" required><?php echo $mt['isi'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <input type="date" name="tgl_mulai" class="form-control" rel="tooltip" title="waktu Mulai" value="<?php echo $mt['tgl_mulai'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <input type="date" name="tgl_berakhir" class="form-control" rel="tooltip" title="Waktu Berakhir" value="<?php echo $mt['tgl_berakhir'] ?>" required>
                                                </div>
                                            </div>
                                        </div>   
                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                        <a href="<?php echo base_url('sim/master_task_karyawan') ?>" type="button" name="cancel" class="btn btn-danger">Cancel</a>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>