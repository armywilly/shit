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
                                    <h4 class="title">Create Data Associates</h4>
                                </div>
                                <div class="card-content">
                                    <form action="<?php echo base_url('admin/associates/create') ?>" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control" value="<?php echo set_value('jabatan') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keahlian</label>
                                                    <select name="product_id" class="form-control">
                                                        <?php foreach($products as $list) { ?>
                                                        <option value="<?php echo $list['product_id'] ?>">
                                                            <?php echo $list['product_name'] ?>
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
                                                    <input type="text" name="pendidikan" class="form-control" value="<?php echo set_value('pendidikan') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sertifikat</label>
                                                    <input type="text" name="sertifikat" class="form-control" value="<?php echo set_value('sertifikat') ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status Publish</label>
                                                    <select name="status_staff" class="form-control">
                                                        <option value="Yes">Yes, Publish</option>
                                                        <option value="No">No, Only for internal used</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Size Gambar</label>
                                                    <select name="ukuran" class="form-control">
                                                        <option value="Small">Small</option>
                                                        <option value="Large">Large</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Urutan</label>
                                                    <input type="number" name="urutan" class="form-control" value="<?php echo set_value('urutan') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keyword (Untuk Pencarian Google)</label>
                                                    <input type="text" name="keyword" class="form-control" value="<?php echo set_value('keyword') ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keterangan</label>
                                                    <input type="text" name="isi" class="form-control" value="<?php echo set_value('isi') ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-info">Upload Photo</button>
                                                    <input type="file" name="gambar" class="form-control">
                                                </div>
                                            </div>
                                        </div> 

                                        

                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                        <input type="cancel" name="cancel" class="btn btn-danger" value="Cancel">
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>