<div class="col-md-8 col-sm-8 col-xs-12">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- single-blog start -->
            <article class="blog-post-wrapper">
                <div class="post-thumbnail">
                    <div class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?
                            $no2 = 1;
                            foreach ($galeri_pekerjaan as $gp) {
                            ?>
                                <div class="item <? if ($no2 == 1) {
                                                        echo "active";
                                                    } ?>">
                                    <img src="<?= base_url() . "upload/" . $gp->gambar; ?>" alt="" style="width:100%;">
                                </div>
                            <? $no2++;
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="post-information">
                    <h2><?= $nama_pekerjaan; ?></h2>
                    <div class="entry-meta">
                        <span><i class="fa fa-clock-o"></i> <?= date('d-m-Y', strtotime($tgl_mulai)) . " s.d " . date('d-m-Y', strtotime($tgl_selesai)); ?></span>
                        <span class="tag-meta">
                            <i class="fa fa-folder"></i>
                            <?= $nama_bidang; ?>
                        </span>
                        <span class="tag-meta">
                            <i class="fa fa-map-marker"></i>
                            <?= $lokasi_pekerjaan; ?>
                        </span>
                        <span class="tag-meta">
                            <i class="fa fa-building"></i>
                            <?= $pelanggan; ?>
                        </span>
                        <!--<span><i class="fa fa-comments-o"></i><?= $jmlkomen; ?> komentar</span>-->
                    </div>
                    <div class="entry-content">
                        <span class="tag-meta">
                            <?= html_entity_decode($uraian);
                            ?>
                    </div>
                </div>
            </article>
            <div class="clear"></div>
            <div id="komenarea" class="single-post-comments">
                <? if ($jmlkomen > 0) { ?>
                    <div class="comments-area">
                        <div class="comments-heading">
                            <h3><?= $jmlkomen; ?> komentar</h3>
                        </div>
                        <div class="comments-list">
                            <ul>
                                <?
                                $daftar_komentar = json_decode($komentar);
                                foreach ($daftar_komentar as $dk) {
                                ?>
                                    <li id="<?= $dk->kdkomen; ?>">
                                        <div class="comments-details">
                                            <div class="comments-list-img">
                                                <img src="<?= base_url(); ?>assets/img/blog/b02.jpg" alt="post-author">
                                            </div>
                                            <div class="comments-content-wrap">
                                                <span>
                                                    <b><a href="#"><?= html_entity_decode($dk->nama); ?> dari <?= $dk->perusahaan; ?></a></b>
                                                    Posting
                                                    <span class="post-time"><?= date('d-m-Y H:i a', strtotime($dk->tglkomen)); ?></span>
                                                    <a href="#" class="btn btn-primary btn-xs" style="color:white;" data-toggle="modal" data-target="#form_balas" onclick="ambil_komen('<?= $dk->kdkomen; ?>','<?= $dk->nama; ?>','<?= $dk->perusahaan; ?>')">Balas</a>
                                                </span>
                                                <p><?= html_entity_decode($dk->komentar); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <?
                                    $daftar_komentar_balas = json_decode($dk->balasan);
                                    foreach ($daftar_komentar_balas as $dkb) {
                                    ?>
                                        <li id="<?= $dkb->kdkomen; ?>" class="threaded-comments">
                                            <div class="comments-details">
                                                <div class="comments-list-img">
                                                    <img src="<?= base_url(); ?>assets/img/blog/b02.jpg" alt="post-author">
                                                </div>
                                                <div class="comments-content-wrap">
                                                    <span>
                                                        <b><a href="#"><?= html_entity_decode($dkb->nama); ?> dari <?= $dkb->perusahaan; ?></a></b>
                                                        Posting
                                                        <span class="post-time"><?= date('d-m-Y H:i a', strtotime($dkb->tglkomen)); ?></span>
                                                        <a href="#" class="btn btn-primary btn-xs" style="color:white;" data-toggle="modal" data-target="#form_balas" onclick="ambil_komen('<?= $dk->kdkomen; ?>','<?= $dkb->nama; ?>','<?= $dkb->perusahaan; ?>')">Balas</a>
                                                    </span>
                                                    <p><?= html_entity_decode($dkb->komentar); ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <? } ?>
                                <? } ?>
                            </ul>

                            <div class="col-sm-12 text-center">
                                <ul class="pagination">
                                    <? if ($page == 1) { ?>
                                        <li class="disabled"><a href="#"><span class="fa fa-fast-backward"></a></li>
                                        <li class="disabled"><a href="#"><span class="fa fa-step-backward"></a></li>
                                    <? } else {
                                        $link_prev = ($page > 1) ? $page - 1 : 1; ?>
                                        <li><a href="<?= base_url(); ?>landing/detail/<?= $page; ?>/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>"><span class="fa fa-fast-backward"></a></li>
                                        <li><a href="<?= base_url(); ?>landing/detail/<?= $link_prev; ?>/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>"><span class="fa fa-step-backward"></a></li>
                                    <?
                                    }

                                    for ($i = $start_number; $i <= $end_number; $i++) {
                                        if ($page == $i) {
                                            $link_active = "";
                                            $link_color = "class='disabled'";
                                        } else {
                                            $link_active = base_url() . "landing/detail/$i/$kode_bidang/$kode_pekerjaan";
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
                                        <li><a href="<?= base_url(); ?>landing/detail/<?= $link_next; ?>/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>"><span class="fa fa-step-forward"></a></li>
                                        <li><a href="<?= base_url(); ?>landing/detail/<?= $jumlah_page; ?>/<?= $kode_bidang; ?>/<?= $kode_pekerjaan; ?>"><span class="fa fa-fast-forward"></a></li>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <? } ?>
                <div class="comment-respond">
                    <h3 class="comment-reply-title">Tinggal Pesan</h3>
                    <span class="email-notes">Email Anda tidak akan di publikasi, Isilah dengan lengkap.</span>
                    <form method="post" action="<?= base_url(); ?>blog/komentar/1>">
                        <input type="hidden" id="kode_bidang" name="kode_bidang" value="<?= $kode_bidang; ?>" />
                        <input type="hidden" id="kode_pekerjaan" name="kode_pekerjaan" value="<?= $kode_pekerjaan; ?>" />
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <p>Nama</p>
                                <input type="text" id="nama" name="nama" maxlength="100" autocomplete="off" required />
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <p>Email</p>
                                <input type="email" id="email" name="email" maxlength="100" autocomplete="off" required />
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <p>Perusahaan</p>
                                <input type="text" id="perusahaan" name="perusahaan" maxlength="100" autocomplete="off" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                <p>Komentar/Pesan</p>
                                <textarea id="komentar" name="komentar" cols="30" rows="10" style="width:100%;" required></textarea>
                                <input type="submit" value="Posting Komentar/Pesan" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- single-blog end -->
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- End Blog Area -->
<div class="clearfix"></div>

<!-- Modal -->
<!--Formulir-->
<div class="modal fade" id="form_balas" tabindex="-1" role="dialog" aria-labelledby="form_balas" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="form_balas_label">Formulir Balasan</h4>
            </div>
            <form id="frm_balasan" name="frm_balasan" method="post" action="<?= base_url(); ?>blog/komentar/2">
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