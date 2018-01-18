<style>
#imagePreview {
    margin-top: 7px;
    width: 250px;
    height: 200px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>

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

<div class="content">
    <div class="container-fluid">
        <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Create Data Karyawan</h4>
                                </div>
                                <div class="card-content">
                                    <form action="<?php echo base_url('sim/karyawan/edit/'.$k->id_staff) ?>" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" value="<?php echo $k->nama; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nip Karyawan</label>
                                                    <input type="text" name="nip" class="form-control" value="<?php echo $k->nip;?>" disabled>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Jabatan</label>
                                                    <select name="id_jabatan" class="form-control">
                                                        <?php foreach($mj as $list) { ?>
                                                        <option value="<?php echo $list['id_jabatan']; ?>" <?php if($list['id_jabatan']==$list['id_jabatan']) { echo "selected"; } ?>><?php echo $list['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tempat & tanggal Lahir</label>
                                                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $k->tempat_lahir ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $k->tgl_lahir ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Pendidikan</label>
                                                    <input type="text" name="pendidikan" class="form-control" value="<?php echo $k->pendidikan ?>" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sertifikat</label>
                                                    <input type="text" name="sertifikat" class="form-control" value="<?php echo $k->sertifikat ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $k->email ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                     
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">NPWP Karyawan</label>
                                                    <input type="text" name="npwp" class="form-control" value="<?php echo $k->npwp ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">BPJS Karyawan</label>
                                                    <input type="text" name="bpjs" class="form-control" value="<?php echo $k->bpjs ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status Publish</label>
                                                    <select name="status_staff" class="form-control">
                                                        <option value="Yes" <?php if($k->status_staff=="Yes") { echo "selected"; } ?>>Yes, Publish</option>
                                                        <option value="No" <?php if($k->status_staff=="No") { echo "selected"; } ?>>No, Only for internal used</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Size Gambar</label>
                                                    <select name="ukuran" class="form-control">
                                                        <option value="Small" <?php if($k->ukuran=="Small") { echo "selected"; } ?>>Small</option>
                                                        <option value="Large" <?php if($k->ukuran=="Large") { echo "selected"; } ?>>Large</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="Male" <?php if($k->gender=="Male") { echo "selected"; } ?>>Male</option>
                                                        <option value="Female" <?php if($k->gender=="Female") { echo "selected"; } ?>>Female</option>
                                                        <option value="Other" <?php if($k->gender=="Other") { echo "selected"; } ?>>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status Karyawan</label>
                                                    <select name="status_karyawan" class="form-control">
                                                        <option value="Aktif" <?php if($k->status_karyawan=="Aktif") { echo "selected"; } ?>>Aktif</option>
                                                        <option value="Non-Aktif" <?php if($k->status_karyawan=="Non-Aktif") { echo "selected"; } ?>>Non-Aktif</option>
                                                    </select>
                                                </div>
                                            </div>          
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keyword (Untuk Pencarian)</label>
                                                    <input type="text" name="keyword" class="form-control" value="<?php echo $k->keyword ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keterangan</label>
                                                    <input type="text" name="isi" class="form-control" value="<?php echo $k->isi ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-info">Upload Photo</button>
                                                    <input type="file" name="image" class="form-control">
                                                    <div id="imagePreview"></div>
                                                        <div class="gambar"><img src="<?php echo base_url('./upload/image/thumbs/'.$k->image) ?>" width="75" height="75"></div>
                                                </div>
                                            </div>
                                        </div> 

                                        

                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                        <a  href="<?php echo base_url('sim/karyawan'); ?>" type="button" name="cancel" class="btn btn-danger">Cancel</a>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>