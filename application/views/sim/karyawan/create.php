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
                                    <form action="<?php echo base_url('sim/karyawan/create') ?>" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nip Karyawan</label>
                                                    <input type="text" name="nip" class="form-control" value="<?php echo $kd['nip'];?>">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Jabatan</label>
                                                    <select name="id_jabatan" class="form-control">
                                                        <?php foreach($mj as $list) { ?>
                                                        <option value="<?php echo $list['id_jabatan'] ?>">
                                                            <?php echo $list['name'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Tempat & tanggal Lahir</label>
                                                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo set_value('tempat_lahir') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo set_value('tgl_lahir') ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Pendidikan</label>
                                                    <input type="text" name="pendidikan" class="form-control" value="<?php echo set_value('pendidikan') ?>" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sertifikat</label>
                                                    <input type="text" name="sertifikat" class="form-control" value="<?php echo set_value('sertifikat') ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                     
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">NPWP Karyawan</label>
                                                    <input type="text" name="npwp" class="form-control" value="<?php echo set_value('npwp') ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">BPJS Karyawan</label>
                                                    <input type="text" name="bpjs" class="form-control" value="<?php echo set_value('bpjs') ?>" required>
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
                                                    <label class="control-label">Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Status Karyawan</label>
                                                    <select name="status_karyawan" class="form-control">
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Non-Aktif">Non-Aktif</option>
                                                    </select>
                                                </div>
                                            </div>          
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keyword (Untuk Pencarian)</label>
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
                                                    <input type="file" name="image" class="form-control" value="<?php echo set_value('image') ?>">
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