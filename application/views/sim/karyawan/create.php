
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
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Input Data Karyawan</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <!-- Form Start -->
                              <form action="<?php echo base_url('sim/karyawan/create') ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">No Induk Pegawai</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nip" placeholder="No Induk Pegawai" class="form-control" value="<?php echo set_value('nip') ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">No Advocat</label>
                                            <div class="col-md-9">
                                                <input type="text" name="no_advokat" placeholder="No Advocat(Optional)" class="form-control" value="<?php echo set_value('no_advokat') ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Tempat Lahir</label>
                                            <div class="col-md-9">
                                                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo set_value('tempat_lahir') ?>" placeholder="Tempat Lahir (Kota)" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Tanggal Lahir</label>
                                            <div class="col-md-9">
                                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo set_value('tgl_lahir') ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Sertifikat</label>
                                            <div class="col-md-9">
                                                <input type="text" name="sertifikat" class="form-control" value="<?php echo set_value('sertifikat') ?>" placeholder="Sertifikat" required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="Email ex: mail@email.com" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Linked In</label>
                                            <div class="col-md-9">
                                                <input type="text" name="linkedin" class="form-control" value="<?php echo set_value('linkedin') ?>" placeholder="Paste Your Url Linked In Here" required>
                                            </div>
                                        </div>

                                </div><!-- end col -->

                                <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Jabatan</label>
                                            <div class="col-md-9">
                                                <select name="id_jabatan" class="form-control">
                                                        <?php foreach($mj as $list) { ?>
                                                        <option value="<?php echo $list['id_jabatan'] ?>">
                                                            <?php echo $list['jabatan'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">NPWP Karyawan</label>
                                            <div class="col-md-9">
                                                <input type="text" name="npwp" class="form-control" value="<?php echo set_value('npwp') ?>" placeholder="NPWP" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">BPJS Karyawan</label>
                                            <div class="col-md-9">
                                                <input type="text" name="bpjs" class="form-control" value="<?php echo set_value('bpjs') ?>" placeholder="BPJS" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Status Publish</label>
                                            <div class="col-md-9">
                                                <select name="status_staff" class="form-control">
                                                        <option value="Yes">Yes, Publish</option>
                                                        <option value="No">No, Only for internal used</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Ukuran Foto</label>
                                            <div class="col-md-9">
                                                <select name="ukuran" class="form-control">
                                                        <option value="Small">Small</option>
                                                        <option value="Large">Large</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <select name="gender" class="form-control">
                                                        <option value="Male">Pria</option>
                                                        <option value="Female">Wanita</option>
                                                        <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" style="text-align: left;">Status Karyawan</label>
                                            <div class="col-md-9">
                                                <select name="status_karyawan" class="form-control">
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Non-Aktif">Non-Aktif</option>
                                                </select>
                                            </div>
                                        </div>                                    
                                </div><!-- end col -->

                                <div class="col-lg-12">
                                    <div class="form-group">
                                            <label class="control-label" style="text-align: left;">Pendidikan</label>
                                            <textarea id="tools_editor" name="pendidikan" rows="7" class="form-control"><?php echo set_value('pendidikan') ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                            <label class="control-label" style="text-align: left;">Biodata Singkat</label>
                                            <textarea id="tools_editor" name="biodata" rows="7" class="form-control"><?php echo set_value('biodata') ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" style="text-align: left;">Keyword Search</label>
                                        <div class="col-md-9">
                                            <textarea rows="10" id="tools_editor" name="keyword" class="form-control"><?php echo set_value('keyword') ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" style="text-align: left;">Upload Foto</label>
                                        <div class="col-md-9">
                                            <input type="file" value="<?php echo set_value('image') ?>" name="image" class="dropify" data-max-file-size="0.3M"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="<?php echo base_url('sim/karyawan') ?>" type="button"
                                                    class="btn btn-danger waves-effect">Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>

                              </form><!-- Form End -->

                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div><!-- End row-->
        </div><!-- End Cont -->