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
                        Komentar (Pekerjaan: <?= $nama_pekerjaan; ?>)
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?= base_url(); ?>pekerjaan/index/1/<?= $kode_bidang; ?>" class="btn btn-default btn-sm pull-right">Kembali ke Daftar Pekerjaan</a>
                            <form class="form-horizontal" method="POST" action="<?= base_url(); ?>komentar/index/1/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <div class="input-group margin">
                                            <div class="input-group-btn">
                                                <a href="<?= base_url(); ?>komentar/index/1/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>" class="btn btn-danger btn-sm">Segarkan</a>
                                            </div>
                                            <select class="form-control input-sm" name="kategori">
                                                <option value="nama">Nama</option>
                                                <option value="email">Email</option>
                                                <option value="komentar">Isi Komentar/Pesan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group margin">
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
                                        <th width="200px">Nama</th>
                                        <th width="200px">Email</th>
                                        <th width="200px">Perusahaan</th>
                                        <th>Komentar</th>
                                        <th width="50px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $hasil = json_decode($komentar);
                                    foreach ($hasil as $k) {
                                    ?>
                                        <tr>
                                            <td align="center" style="font-size:9pt;"><?= $no; ?></td>
                                            <td style="font-size:9pt;"><?= date('d-m-Y H:i:s ', strtotime($k->tglkomen)); ?></td>
                                            <td style="font-size:9pt;"><?= $k->nama; ?></td>
                                            <td style="font-size:9pt;"><?= $k->email; ?></td>
                                            <td style="font-size:9pt;"><?= $k->perusahaan; ?></td>
                                            <td style="font-size:9pt;"><?= html_entity_decode($k->komentar); ?></td>
                                            <td align="center">
                                                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#form_balas" onclick="ambil_komen('<?= $k->kdkomen; ?>','<?= $k->nama; ?>','<?= $k->perusahaan; ?>')"><i class="fa fa-comment"></i></a>
                                                <a href="<?= base_url(); ?>komentar/proses/3/<?= $k->kdkomen; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Menghapus komentar ?')"><i class="fa fa-trash"></i></a>
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
                                        <li><a href="<?= base_url(); ?>komentar/index/1/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>/<?= $cari; ?>/<?= $kategori; ?>"><span class="fa fa-fast-backward"></a></li>
                                        <li><a href="<?= base_url(); ?>komentar/index/<?= $link_prev; ?>/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>/<?= $cari; ?>/<?= $kategori; ?>"><span class="fa fa-step-backward"></a></li>
                                    <?
                                    }

                                    for ($i = $start_number; $i <= $end_number; $i++) {
                                        if ($page == $i) {
                                            $link_active = "";
                                            $link_color = "class='disabled'";
                                        } else {
                                            $link_active = base_url() . "bidang/index/$i/$kode_bidang/$kode_pekerjaan/$cari/$kategori";
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
                                        <li><a href="<?= base_url(); ?>komentar/index/<?= $link_next; ?>/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>/<?= $cari; ?>/<?= $kategori; ?>"><span class="fa fa-step-forward"></a></li>
                                        <li><a href="<?= base_url(); ?>komentar/index/<?= $jumlah_page; ?>/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>/<?= $cari; ?>/<?= $kategori; ?>"><span class="fa fa-fast-forward"></a></li>
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
<div class="modal fade" id="form_balas" tabindex="-1" role="dialog" aria-labelledby="form_balas" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_balas_label">Formulir Balasan</h4>
            </div>
            <form id="frm_balasan" name="frm_balasan" method="post" action="<?= base_url(); ?>komentar/proses/1">
                <input type="hidden" id="kode_bidang_balas" name="kode_bidang_balas" value="<?= $kode_bidang; ?>" />
                <input type="hidden" id="kode_pekerjaan_balas" name="kode_pekerjaan_balas" value="<?= $kode_pekerjaan; ?>" />
                <input type="hidden" class="form-control" name="kode_komentar" id="kode_komentar" value="" />
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_balas" id="nama_balas" value="" maxlength=100 autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email_balas" id="email_balas" value="" maxlength=100 autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label>Perusahaan</label>
                        <input type="text" class="form-control" name="perusahaan_balas" id="perusahaan_balas" value="" maxlength=100 autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label>Balasan Komentar/Pesan</label>
                        <code id="kepada">balasan </code>
                        <input type="hidden" class="form-control" name="balas_ke" id="balas_ke" value="" />
                        <textarea id="balasan_komentar" name="balasan_komentar" cols="30" rows="10" style="width:100%;" required></textarea>
                    </div>
                </div>
                <div id="savebtn" class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Posting Balasan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal-content -->