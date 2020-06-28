<div class="blog-page area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="page-head-blog">
                    <div class="single-blog-page">
                        <!-- search option start -->
                        <form method="post" action="<?= base_url(); ?>blog/index/1/<?= $kode_bidang; ?>">
                            <div class="search-option">
                                <input type="text" name="cari" placeholder="Nama Pekerjaan..." required>
                                <button class="button" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <!-- search option end -->
                    </div>
                    <div class="single-blog-page">
                        <!-- recent start -->
                        <div class="left-blog">
                            <h4>Posting Terbaru</h4>
                            <div class="recent-post">
                                <?
                                $daftar_posting = json_decode($posting);
                                foreach ($daftar_posting as $dp) {
                                ?>
                                    <div class="recent-single-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="<?= $dp->file_gambar; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="<?= base_url(); ?>blog/detail/1/<?= $kode_bidang; ?>/<?= $dp->kdpekerjaan; ?>"><?= $dp->nama_pekerjaan; ?><br><small><b><?= $dp->pelanggan; ?></b></small></a></p>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                        <!-- recent end -->
                    </div>
                    <div class="single-blog-page">
                        <div class="left-blog">
                            <h4>Bidang</h4>
                            <ul>
                                <?
                                foreach ($bidang as $b) {
                                ?>
                                    <li>
                                        <a href="<?= base_url(); ?>blog/index/1/<?= $b->kdbidkerja; ?>"><?= $b->nama_bidang; ?></a>
                                    </li>
                                <? } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="single-blog-page">
                        <div class="left-tags blog-tags">
                            <div class="popular-tag left-side-tags left-blog">
                                <h4>popular tags</h4>
                                <ul>
                                    <?
                                    foreach ($tags as $t) {
                                    ?>
                                        <li>
                                            <a href="<?= base_url(); ?>blog/index/1/<?= $kode_bidang; ?>/<?= $t->nama_tags; ?>"><?= $t->nama_tags; ?></a>
                                        </li>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End left sidebar -->