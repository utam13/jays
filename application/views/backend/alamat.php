<div class="container-fluid">
    <!-- Center Column -->
    <div class="col-sm-12">

        <!-- Alert -->
        <?
        extract($alert);
        if ($kode_alert != "") {
        ?>
            <div class="alert <?= $jenisbox ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Pesan:</strong> <?= str_replace("%7C", "<br>", str_replace("%20", " ", $isipesan)); ?>
            </div>
        <? } ?>
        <!-- Elektrikal dan Mekanikal -->
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Lokasi Kantor &amp; Sosial Media Link
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?= base_url(); ?>alamat/proses">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No. Telp.</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $telp; ?>" maxlength=20 placeholder="No. Telp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No. Fax</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="fax" name="fax" value="<?= $fax; ?>" maxlength=20 placeholder="No. Fax">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">WhatsApp</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-whatsapp"></i></span>
                                    <input type="text" class="form-control" id="wa" name="wa" maxlength=20 value="<?= $wa; ?>" placeholder="No. WhatsApp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat_email" name="alamat_email" value="<?= $email; ?>" maxlength=100 placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Web</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="url_web" name="url_web" value="<?= $web; ?>" maxlength=100 placeholder="Website">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Lokasi Kantor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lokasi_kantor" name="lokasi_kantor" value="<?= $lokasi; ?>" maxlength=100 placeholder="Lokasi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $kecamatan; ?>" maxlength=100 placeholder="Kecamatan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Propinsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="propinsi" name="propinsi" value="<?= $propinsi; ?>" maxlength=100 placeholder="Propinsi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Google Map Location</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control" id="link_googlemap" name="link_googlemap" value="<?= $link_googlemap; ?>" placeholder="Link Google Map">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Facebook</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <input type="text" class="form-control" id="link_facebook" name="link_facebook" value="<?= $link_facebook; ?>" placeholder="Link Facebook">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Instagram</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    <input type="text" class="form-control" id="link_ig" name="link_ig" value="<?= $link_ig; ?>" placeholder="Link Instagram">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Twitter</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    <input type="text" class="form-control" id="link_twitter" name="link_twitter" value="<?= $link_twitter; ?>" placeholder="Link Twitter">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Link Youtube</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                    <input type="text" class="form-control" id="link_youtube" name="link_youtube" value="<?= $link_youtube; ?>" placeholder="Link Youtube">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Logo Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="nama_file" name="nama_file" value="<?= $nama_file; ?>">
                                <input type="file" id="pilih" name="pilih" accept=".jpg,.png,.gif" style="display:none;">
                                <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                                <div class="input-group margin">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-danger" onclick="upload_logo()">Pilih Logo</button>
                                    </div>
                                    <input type="text" class="form-control" id="file_target" name="file_target" value="<?= $logo; ?>" placeholder="Pilih Gambar Logo Perusahaan" readonly>
                                    <div id="btnlihat" class="input-group-btn">
                                        <a href="<?= $file_logo; ?>" id="linklogo" target="_blank" class="btn btn-success">Lihat Logo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">User Name CMS</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>" maxlength=100 placeholder="User Name CMS">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password CMS</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= $password; ?>" maxlength=100 placeholder="Password CMS">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" onclick="lihatpassword()"><span id="iconlihat" class="fa fa-eye"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="progress_div" class="progress progress-sm active" style="display:none;">
                            <div id="progress_bar" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                        </div>
                        <a href="<?= base_url(); ?>" target="_blank" class="btn btn-default">Lihat Tampilan</a>
                        <a href="<?= base_url(); ?>alamat" class="btn btn-default">Refresh</a>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->