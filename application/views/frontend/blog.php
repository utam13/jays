            <!-- Start single blog -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <?
                    $daftar_pekerjaan = json_decode($pekerjaan);
                    foreach ($daftar_pekerjaan as $dp) {
                    ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="#">
                                        <img src="<?= $dp->file_gambar; ?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                                    <span class="comments-type">
                                        <i class="fa fa-comment-o"></i>
                                        <a href="#"><?= $dp->jmlkomen; ?> komentar</a>
                                    </span>
                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($dp->tgl_mulai)) . " s.d " . date('d-m-Y', strtotime($dp->tgl_selesai)); ?>
                                    </span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="#"><?= $dp->nama_pekerjaan; ?></a>
                                    </h4>
                                    <b>Lokasi:</b> <?= $dp->lokasi; ?><br>
                                    <b>Pelanggan:</b> <?= $dp->pelanggan; ?><br>
                                    <b>Uraian Pekerjaan:</b><br>
                                    <?= substr(strip_tags(html_entity_decode($dp->uraian)), 0, 500); ?>...
                                </div>
                                <span>
                                    <a href="<?= base_url(); ?>blog/detail/1/<?= $kode_bidang; ?>/<?= $dp->kdpekerjaan; ?>" class="ready-btn">Baca</a>
                                </span>
                            </div>
                        </div>
                    <? } ?>
                    <div class="blog-pagination">
                        <? if ($jumlah_page > 0) { ?>
                            <ul class="pagination">
                                <? if ($page == 1) { ?>
                                    <li class="disabled"><a href="#"><span class="fa fa-fast-backward"></a></li>
                                    <li class="disabled"><a href="#"><span class="fa fa-step-backward"></a></li>
                                <? } else {
                                    $link_prev = ($page > 1) ? $page - 1 : 1; ?>
                                    <li><a href="<?= base_url(); ?>blog/index/1/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-fast-backward"></a></li>
                                    <li><a href="<?= base_url(); ?>blog/index/<?= $link_prev; ?>/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-step-backward"></a></li>
                                <?
                                }

                                for ($i = $start_number; $i <= $end_number; $i++) {
                                    if ($page == $i) {
                                        $link_active = "";
                                        $link_color = "class='disabled'";
                                    } else {
                                        $link_active = base_url() . "blog/index/$i/$kode_bidang/$cari";
                                        $link_color = "class='active'";
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
                                    <li><a href="<?= base_url(); ?>blog/index/<?= $link_next; ?>/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-step-forward"></a></li>
                                    <li><a href="<?= base_url(); ?>blog/index/<?= $jumlah_page; ?>/<?= $kode_bidang; ?>/<?= $cari; ?>"><span class="fa fa-fast-forward"></a></li>
                                <? } ?>
                            </ul>
                        <? } ?>
                    </div>
                </div>
            </div>

            </div>
            </div>
            </div>
            <!-- End Blog Area -->

            <div class="clearfix"></div>