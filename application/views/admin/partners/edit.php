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

<div class="content">
    <div class="container-fluid">
        <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Edit Data Partners</h4>
                                </div>
                                <div class="card-content">
                                    <form action="<?php echo base_url('admin/partners/edit/'.$staff->id_staff) ?>" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" value="<?php echo $staff->nama ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control" value="<?php echo $staff->jabatan ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keahlian</label>
                                                    <select name="product_id" class="form-control">
                                                        <?php foreach($products as $list) { ?>
                                                        <option value="<?php echo $list['product_id'] ?>">
                                                            <?php if ($list['product_name']=="product_name") {echo "selected";} ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Pendidikan</label>
                                                    <input type="text" name="pendidikan" class="form-control" value="<?php echo $staff->pendidikan ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sertifikat</label>
                                                    <input type="text" name="sertifikat" class="form-control" value="<?php echo $staff->sertifikat ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status Publish</label>
                                                    <select name="status_staff" class="form-control">
                                                        <option value="Yes" <?php if($staff->status_staff=="Yes") { echo "selected"; } ?>>Yes, Publish</option>
                                                        <option value="No" <?php if($staff->status_staff=="No") { echo "selected"; } ?>>No, Only for internal used</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Size Gambar</label>
                                                    <select name="ukuran" class="form-control">
                                                        <option value="Small" <?php if($staff->ukuran=="Small") { echo "selected"; } ?>>Small</option>
                                                        <option value="Large" <?php if($staff->ukuran=="Large") { echo "selected"; } ?>>Large</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Urutan</label>
                                                    <input type="number" name="urutan" class="form-control" value="<?php echo $staff->urutan ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $staff->email ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keyword (Untuk Pencarian Google)</label>
                                                    <input type="text" name="keywords" class="form-control" value="<?php echo $staff->keywords ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keterangan</label>
                                                    <input type="text" name="isi" class="form-control" value="<?php echo $staff->isi ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-info">Upload Photo&nbsp;
                                                        <i class="material-icons">cloud_upload</i>
                                                    </button>
                                                    <input type="file" name="gambar" class="form-control" id="file">
                                                        <div id="imagePreview"></div>
                                                        <div class="gambar"><img src="<?php echo base_url('./upload/image/thumbs/'.$staff->gambar) ?>" width="75" height="75"></div>
                                                </div>
                                            </div>
                                        </div> 

                                        

                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                        <a type="cancel" name="cancel" class="btn btn-danger" value="Cancel" href="<?php echo base_url('admin/partners/');?>">Cancel
                                        </a>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>