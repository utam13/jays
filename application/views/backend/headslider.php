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
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Slider Elektrikal &amp; Mekanikal
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?= base_url(); ?>headslider/proses/1">
                            <input type="hidden" id="nama_file_slide1" name="nama_file_slide1" value="<?= $gambarslide1; ?>">
                            <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                            <input type="file" id="pilih_slide1" name="pilih_slide1" accept=".jpg,.png,.bmp,.gif" style="display:none;">
                            <div class="form-group text-center">
                                <img src="<?= $file_gambarslide1; ?>" id="slide1" alt="Slider 1" onclick="upload_slide(1)" style="width:100%;">
                                <div id="progress_div_slide1" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_slide1" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                </div>
                                <code>Klik gambar untuk meng-upload max. 1 Mb</code>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kalimatslider1" name="kalimatslider1" value="<?= $kalimatslide1; ?>" maxlength=80 placeholder="Kalimat Singkat Slide 1" required>
                            </div>
                            <a href="<?= base_url(); ?>" target="_blank" class="btn btn-success">Show</a>
                            <button type="submit" class="btn btn-primary pull-right">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Slider General Supplier
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?= base_url(); ?>headslider/proses/2">
                            <input type="hidden" id="nama_file_slide2" name="nama_file_slide2" value="<?= $gambarslide2; ?>">
                            <input type="file" id="pilih_slide2" name="pilih_slide2" accept=".jpg,.png,.bmp,.gif" style="display:none;">
                            <div class="form-group text-center">
                                <img src="<?= $file_gambarslide2; ?>" id="slide2" alt="Slider 2" onclick="upload_slide(2)" style="width:100%;">
                                <div id="progress_div_slide2" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_slide2" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                </div>
                                <code>Klik gambar untuk meng-upload max. 1 Mb</code>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kalimatslider2" name="kalimatslider2" value="<?= $kalimatslide2; ?>" maxlength=80 placeholder="Kalimat Singkat Slide 2" required>
                            </div>
                            <a href="<?= base_url(); ?>" target="_blank" class="btn btn-success">Show</a>
                            <button type="submit" class="btn btn-primary pull-right">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Slider Konstruksi
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?= base_url(); ?>headslider/proses/3">
                            <input type="hidden" id="nama_file_slide3" name="nama_file_slide3" value="<?= $gambarslide3; ?>">
                            <input type="file" id="pilih_slide3" name="pilih_slide3" accept=".jpg,.png,.bmp,.gif" style="display:none;">
                            <div class="form-group text-center">
                                <img src="<?= $file_gambarslide3; ?>" id="slide3" alt="Slider 3" onclick="upload_slide(3)" style="width:100%;">
                                <div id="progress_div_slide3" class="progress progress-sm active" style="display:none;">
                                    <div id="progress_bar_slide3" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                </div>
                                <code>Klik gambar untuk meng-upload max. 1 Mb</code>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kalimatslider3" name="kalimatslider3" value="<?= $kalimatslide3; ?>" maxlength=80 placeholder="Kalimat Singkat Slide 3" required>
                            </div>
                            <a href="<?= base_url(); ?>" target="_blank" class="btn btn-success">Show</a>
                            <button type="submit" class="btn btn-primary pull-right">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->