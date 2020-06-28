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
                        Pekerjaan (Bidang: <?= $nama_bidang; ?>)
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#form_pekerjaan" onclick="ambil_pekerjaan('<?= base_url(); ?>pekerjaan/proses/1','<?= $kode_bidang; ?>','','','','','','','')">Tambah</button>

                            <form class="form-horizontal" method="POST" action="<?= base_url(); ?>pekerjaan/index/1/<?= $kode_bidang; ?>">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="input-group margin">
                                            <div class="input-group-btn">
                                                <a href="<?= base_url(); ?>pekerjaan/index/1/<?= $kode_bidang; ?>" class="btn btn-danger btn-sm">Segarkan</a>
                                            </div>
                                            <input type="text" class="form-control input-sm" id="cari" name="cari" value="" placeholder="Isi nama pekerjaan" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary btn-sm">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th width="100px">Tanggal</th>
                                        <th width="200px">Pekerjaan</th>
                                        <th width="200px">Lokasi</th>
                                        <th width="200px">Pelanggan</th>
                                        <th>Uraian</th>
                                        <th width="150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $hasil = json_decode($pekerjaan);
                                    foreach ($hasil as $p) {
                                    ?>
                                        <tr>

                                            <td align="center" style="font-size:9pt;"><?= $no; ?></td>
                                            <td style="font-size:9pt;"><?= date('d-m-Y', strtotime($p->tgl_mulai)) . "<br>sampai<br>" . date('d-m-Y', strtotime($p->tgl_selesai)); ?></td>
                                            <td style="font-size:9pt;"><?= $p->nama_pekerjaan; ?></td>
                                            <td style="font-size:9pt;"><?= $p->lokasi; ?></td>
                                            <td style="font-size:9pt;"><?= $p->pelanggan; ?></td>
                                            <td style="font-size:9pt;"><?= substr(strip_tags(html_entity_decode($p->uraian)), 0, 200); ?>...</td>
                                            <td align="center">
                                                <a href="<?= base_url(); ?>galeri/index/1/<?= $p->kdpekerjaan; ?>" class="btn btn-success btn-xs">Galeri</a>
                                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#form_pekerjaan" onclick="ambil_pekerjaan('<?= base_url(); ?>pekerjaan/proses/2','<?= $p->kdbidkerja; ?>','<?= $p->kdpekerjaan; ?>','<?= $p->nama_pekerjaan; ?>','<?= $p->tgl_mulai; ?>','<?= $p->tgl_selesai; ?>','<?= $p->lokasi; ?>','<?= $p->pelanggan; ?>','<?= $p->uraian; ?>')"><i class="fa fa-pencil"></i></a>
                                                <a href="<?= base_url(); ?>pekerjaan/proses/3/<?= $p->kdpekerjaan; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Menghapus pekerjaan <?= $p->nama_pekerjaan; ?> beserta seluruh galerinya ?')"><i class="fa fa-trash"></i></a>
                                                <br><br>
                                                <a href="<?= base_url(); ?>komentar/index/1/<?= $kode_bidang; ?>/<?= $p->kdpekerjaan; ?>/-/-" class="btn btn-default btn-xs"><?= $p->jmlkomen; ?> Komentar</a>
                                            </td>
                                        </tr>
                                    <? $no++;
                                    } ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="col-sm-12">
                            <? if ($jumlah_page > 0) { ?>
                                <ul class="pagination" style="float:right;">
                                    <? if ($page == 1) { ?>
                                        <li class="disabled"><a href="#"><span class="fa fa-fast-backward"></a></li>
                                        <li class="disabled"><a href="#"><span class="fa fa-step-backward"></a></li>
                                    <? } else {
                                        $link_prev = ($page > 1) ? $page - 1 : 1; ?>
                                        <li><a href="<?= base_url(); ?>bidang/index/1/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-fast-backward"></a></li>
                                        <li><a href="<?= base_url(); ?>bidang/index/<?= $link_prev; ?>/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-step-backward"></a></li>
                                    <?
                                    }

                                    for ($i = $start_number; $i <= $end_number; $i++) {
                                        if ($page == $i) {
                                            $link_active = "";
                                            $link_color = "class='disabled'";
                                        } else {
                                            $link_active = base_url() . "bidang/index/$i/$kode_bidang/$cari";
                                            $link_color = "";
                                        }
                                    ?>
                                        <li <?= $link_color; ?>><a href="<?= $link_active; ?>"><?= $i; ?></a></li>
                                    <? }

                                    if ($page == $jumlah_page) {
                                    ?>
                                        <li class="disabled"><a href="#"><span class="fa fa-step-forward"></a></li>
                                        <li class="disabled"><a href="#"><span class="fa fa-fast-forward"></a></li>
                                    <? } else {
                                        $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page; ?>
                                        <li><a href="<?= base_url(); ?>bidang/index/<?= $link_next; ?>/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-step-forward"></a></li>
                                        <li><a href="<?= base_url(); ?>bidang/index/<?= $jumlah_page; ?>/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-fast-forward"></a></li>
                                    <? } ?>
                                </ul>
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
<div class="modal fade" id="form_pekerjaan" tabindex="-1" role="dialog" aria-labelledby="form_pekerjaan" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_pekerjaan_label">Formulir Pekerjaan</h4>
            </div>
            <form id="frm_pekerjaan" name="frm_pekerjaan" method="post" action="">
                <input type="hidden" class="form-control" name="kode" id="kode" value="" />
                <input type="hidden" class="form-control" name="kode_bidang" id="kode_bidang" value="<?= $kode_bidang; ?>" />
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pekerjaan (max. 100 karakter)</label>
                        <input type="text" class="form-control" name="nama_pekerjaan" id="nama_pekerjaan" value="" maxlength=100 autocomplete="off" required />
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" value="" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" value="" autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lokasi Pekerjaan (max. 100 karakter)</label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" value="" maxlength=100 autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label>Pelanggan (Nama Perusahaan/Instansi, max. 100 karakter)</label>
                        <input type="text" class="form-control" name="pelanggan" id="pelanggan" value="" maxlength=100 autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label>Uraian Pekerjaan</label>
                        <textarea id="uraian_pekerjaan" name="uraian_pekerjaan" required></textarea>
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