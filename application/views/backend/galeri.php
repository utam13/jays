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
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Galeri (Pekerjaan: <?= $nama_pekerjaan; ?>)
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?= base_url(); ?>pekerjaan/index/1/<?= $kdbidkerja; ?>" class="btn btn-default btn-sm">Kembali ke Daftar Pekerjaan</a>
                            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#form_galeri">Tambah</button>
                        </div>
                        <div class="col-sm-12">&nbsp;</div>
                        <div class="col-sm-12">
                            <?
                            $daftar_galeri = json_decode($galeri);
                            foreach ($daftar_galeri as $dg) {
                            ?>
                                <div class="col-sm-2">
                                    <a href="<?= $dg->file_gambar; ?>" target="_blank">
                                        <img src="<?= $dg->file_gambar; ?>" style="width:100%;">
                                    </a>
                                    <br><br>
                                    <? if ($dg->utama == 0) { ?>
                                        <a href="<?= base_url(); ?>galeri/proses/2/<?= $dg->kdgaleri; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Set gambar utama ?')">Set Utama</a>
                                    <? } else { ?>
                                        <a href="#" class="btn btn-success btn-xs">Gambar Utama</a>
                                    <? } ?>
                                    <a href="<?= base_url(); ?>galeri/proses/3/<?= $dg->kdgaleri; ?>" class="btn btn-danger btn-xs pull-right" onclick="return confirm('Menghapus galeri ?')">Hapus</a>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->

<!-- Modal -->
<!--Formulir-->
<div class="modal fade" id="form_galeri" tabindex="-1" role="dialog" aria-labelledby="form_galeri" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_galeri_label">Formulir Galeri</h4>
            </div>
            <form id="frm_galeri" name="frm_galeri" method="post" action="<?= base_url(); ?>galeri/proses/1">
                <input type="hidden" class="form-control" name="kode" id="kode" value="" />
                <input type="hidden" class="form-control" name="kode_pekerjaan" id="kode_pekerjaan" value="<?= $kode_pekerjaan; ?>" />
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="nama_file" name="nama_file" value="<?= date('dmYHis') . "-galeri"; ?>" required>
                        <input type="file" id="pilih_galeri" name="pilih_galeri" accept=".jpg,.png,.gif" style="display:none;">
                        <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                        <div class="input-group margin">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-danger" onclick="upload_galeri()">Pilih (max. 1Mb)</button>
                            </div>
                            <input type="text" class="form-control" id="file_target" name="file_target" value="" placeholder="Pilih Gambar Galeri, max. 1 Mb" readonly required>
                            <div id="btnlihat" class="input-group-btn">
                                <a href="#" id="linkgaleri" target="_blank" class="btn btn-success">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="utama" id="utama" value="0">
                                Atur sebagai gambar utama
                            </label>
                        </div>
                    </div>
                </div>
                <div id="savebtn" class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal-content -->