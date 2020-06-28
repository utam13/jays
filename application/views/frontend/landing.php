<!-- Start Slider Area -->
<div id="beranda" class="slider-area">
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            <?
            $daftar_slide = json_decode($slide);
            foreach ($daftar_slide as $ds) {
            ?>
                <img src="<?= $ds->file_gambar_slide; ?>" alt="" title="#slider-direction-<?= $ds->no_slide; ?>" />
            <? } ?>
        </div>

        <?
        foreach ($daftar_slide as $ds) {
        ?>
            <div id="slider-direction-<?= $ds->no_slide; ?>" class="slider-direction slider-one">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                                    <h2 class="title1"><?= $ds->nama_bidang; ?></h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2"><?= $ds->kalimat_slide; ?></h1>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                                    <a class="ready-btn page-scroll" href="<?= base_url(); ?>blog/index/1/<?= $ds->kdbidkerja; ?>">Blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>
<!-- End Slider Area -->

<!-- Start About area -->
<div id="tentangkami" class="about-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Tentang Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well end-->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="well-middle">
                    <div class="single-well">
                        <?= $tentangkami; ?>
                    </div>
                </div>
            </div>
            <!-- End col-->
        </div>
    </div>
</div>
<!-- End About area -->

<!-- Start Service area -->
<div id="bidangpekerjaan" class="services-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline services-head text-center">
                    <h2>Bidang Pekerjaan</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="services-contents">
                <?
                foreach ($daftar_slide as $ds) {
                ?>
                    <div class="<?= $ukuran_bidangpekerjaan; ?> col-xs-12">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa <?= $ds->font_icon; ?>"></i>
                                    </a>
                                    <h4><?= $ds->nama_bidang; ?></h4>
                                    <p><?= $ds->kalimat_singkat; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Service area -->

<!-- Start portfolio Area -->
<div id="galeri" class="portfolio-area area-padding fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Galeri Pekerjaan</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Start Portfolio -page -->
            <div class="awesome-project-1 fix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="awesome-menu ">
                        <ul class="project-menu">
                            <li>
                                <a href="<?= base_url(); ?>landing/index/1/<?= $page_pekerjaan; ?>#galeri" <? if ($cari_galeri == "") { ?>class="active" <? } ?>>Semua</a>
                            </li>
                            <?
                            foreach ($daftar_slide as $ds) {
                            ?>
                                <li>
                                    <a href="<?= base_url(); ?>landing/index/1/<?= $page_pekerjaan; ?>/<?= $ds->kdbidkerja; ?>#galeri" <? if ($cari_galeri == $ds->kdbidkerja) { ?>class="active" <? } ?>><?= $ds->nama_bidang ?></a>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="awesome-project-content">
                <?
                $daftar_galeri = json_decode($galeri);
                foreach ($daftar_galeri as $dg) {
                ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-awesome-project">
                            <div class="awesome-img">
                                <a href="#"><img src="<?= $dg->file_gambar; ?>" alt="" /></a>
                                <div class="add-actions text-center">
                                    <div class="project-dec">
                                        <a class="venobox" data-gall="myGallery" href="<?= $dg->file_gambar; ?>">
                                            <h4 style="font-size:12pt;margin-top:-100px;"><?= $dg->nama_pekerjaan; ?></h4>
                                            <span><?= $dg->pelanggan; ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
                <div class="col-sm-12 text-center">
                    <? if ($jumlah_page_galeri > 0) { ?>
                        <ul class="pagination">
                            <? if ($page_galeri == 1) { ?>
                                <li class="disabled"><a href="#"><span class="fa fa-fast-backward"></a></li>
                                <li class="disabled"><a href="#"><span class="fa fa-step-backward"></a></li>
                            <? } else {
                                $link_prev_galeri = ($page_galeri > 1) ? $page_galeri - 1 : 1; ?>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $page_galeri; ?>/<?= $page_pekerjaan; ?>/<?= $cari_galeri; ?>#galeri"><span class="fa fa-fast-backward"></a></li>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $link_prev_galeri; ?>/<?= $page_pekerjaan; ?>/<?= $cari_galeri; ?>#galeri"><span class="fa fa-step-backward"></a></li>
                            <?
                            }

                            for ($i = $start_number_galeri; $i <= $end_number_galeri; $i++) {
                                if ($page_galeri == $i) {
                                    $link_active_galeri = "";
                                    $link_color_galeri = "class='disabled'";
                                } else {
                                    $link_active_galeri = base_url() . "landing/index/$i/$page_pekerjaan/$cari_galeri";
                                    $link_color_galeri = "";
                                }
                            ?>
                                <li <?= $link_color_galeri; ?>><a href="<?= $link_active_galeri; ?>#galeri"><?= $i; ?></a></li>
                            <? }

                            if ($page_galeri == $jumlah_page_galeri) {
                            ?>
                                <li class="disabled"><a href="#"><span class="fa fa-step-forward"></a></li>
                                <li class="disabled"><a href="#"><span class="fa fa-fast-forward"></a></li>
                            <? } else {
                                $link_next_galeri = ($page_galeri < $jumlah_page_galeri) ? $page_galeri + 1 : $jumlah_page_galeri; ?>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $link_next_galeri; ?>/<?= $page_pekerjaan; ?>/<?= $cari_galeri; ?>#galeri"><span class="fa fa-step-forward"></a></li>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $jumlah_page_galeri; ?>/<?= $page_pekerjaan; ?>/<?= $cari_galeri; ?>#galeri"><span class="fa fa-fast-forward"></a></li>
                            <? } ?>
                        </ul>
                    <? } ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- awesome-portfolio end -->

<!-- Start Blog Area -->
<div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Info Pekerjaan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?
                $daftar_pekerjaan = json_decode($pekerjaan);
                foreach ($daftar_pekerjaan as $dp) {
                ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <? if ($dp->file_gambar != "") { ?>
                                <div class="single-blog-img">
                                    <a href="#blog">
                                        <img src="<?= $dp->file_gambar; ?>" alt="">
                                    </a>
                                </div>
                            <? } ?>
                            <div class="blog-meta">
                                <span class="comments-type">
                                    <i class="fa fa-comment-o"></i>
                                    <a href="#blog"><?= $dp->jmlkomen; ?> komentar</a>
                                </span>
                                <span class="date-type">
                                    <i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($dp->tgl_mulai)) . " s.d " . date('d-m-Y', strtotime($dp->tgl_selesai)); ?>
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="#blog"><?= $dp->nama_pekerjaan; ?></a>
                                </h4>
                                <p>
                                    <?= substr(strip_tags(html_entity_decode($dp->uraian)), 0, 200); ?>
                                </p>
                            </div>
                            <span>
                                <a href="<?= base_url(); ?>blog/detail/1/<?= $dp->kdbidkerja; ?>/<?= $dp->kdpekerjaan; ?>" class="ready-btn">Lebih lanjut</a>
                            </span>
                        </div>
                    </div>
                <? } ?>

                <div class="col-sm-12 text-center">
                    <? if ($jumlah_page_pekerjaan > 0) { ?>
                        <ul class="pagination">
                            <? if ($page_pekerjaan == 1) { ?>
                                <li class="disabled"><a href="#"><span class="fa fa-fast-backward"></a></li>
                                <li class="disabled"><a href="#"><span class="fa fa-step-backward"></a></li>
                            <? } else {
                                $link_prev_pekerjaan = ($page_pekerjaan > 1) ? $page_pekerjaan - 1 : 1; ?>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $page_galeri; ?>/<?= $page_pekerjaan; ?>#blog"><span class="fa fa-fast-backward"></a></li>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $page_galeri; ?>/<?= $link_prev_pekerjaan; ?>#blog"><span class="fa fa-step-backward"></a></li>
                            <?
                            }

                            for ($i = $start_number_pekerjaan; $i <= $end_number_pekerjaan; $i++) {
                                if ($page_pekerjaan == $i) {
                                    $link_active_pekerjaan = "";
                                    $link_color_pekerjaan = "class='disabled'";
                                } else {
                                    $link_active_pekerjaan = base_url() . "landing/index/$page_galeri/$i";
                                    $link_color_pekerjaan = "";
                                }
                            ?>
                                <li <?= $link_color_pekerjaan; ?>><a href="<?= $link_active_pekerjaan; ?>#blog"><?= $i; ?></a></li>
                            <? }

                            if ($page_pekerjaan == $jumlah_page_pekerjaan) {
                            ?>
                                <li class="disabled"><a href="#"><span class="fa fa-step-forward"></a></li>
                                <li class="disabled"><a href="#"><span class="fa fa-fast-forward"></a></li>
                            <? } else {
                                $link_next_pekerjaan = ($page_pekerjaan < $jumlah_page_pekerjaan) ? $page_pekerjaan + 1 : $jumlah_page_pekerjaan; ?>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $page_galeri; ?>/<?= $link_next_pekerjaan; ?>#blog"><span class="fa fa-step-forward"></a></li>
                                <li><a href="<?= base_url(); ?>landing/index/<?= $page_pekerjaan; ?>/<?= $jumlah_page_galeri; ?>#blog"><span class="fa fa-fast-forward"></a></li>
                            <? } ?>
                        </ul>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->

<!-- Start contact Area -->
<div id="kontak" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Kontak Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-mobile"></i>
                            <p>
                                Phone: <?= $telp; ?><br>
                                <span>Fax: <?= $fax; ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-whatsapp"></i>
                            <p>
                                WhatsApp: <?= $wa; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-envelope-o"></i>
                            <p>
                                Email: <?= $email; ?><br>
                                <span>Web: <?= $web; ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                <?= $lokasi; ?><br>
                                <span><?= $kecamatan; ?>, <?= $propinsi; ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Start Google Map -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->
                    <iframe src="<?= $link_googlemap; ?>" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <!-- End Map -->
                </div>
                <!-- End Google Map -->

                <!-- Start  contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form contact-form">
                        <div id="sendmessage">Pesan Anda telah terkirim. Terima Kasih!</div>
                        <div id="errormessage">Mohon maaf!!! Pesan Anda gagal dikirim. Silakan hubungi kami melalui informasi kontak di atas.</div>
                        <form action="" role="form" class="contactForm">
                            <input type="hidden" id="lokasi" name="lokasi" value="<?= base_url(); ?>">
                            <input type="hidden" id="email_perusahaan" name="email_perusahaan" value="<?= $email; ?>">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Ketikkan minimal 4 karakter dari nama Anda" required />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Ketikkan alamat email Anda dengan benar" required />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:8" data-msg="Ketikkan minimal 8 karakter" required />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Ketikkan pesan untuk kami" placeholder="Pesan" required></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button id="btnkirim" type="submit" onclick="alert('Tunggu hingga muncul pesan')">Kirim Pesan</button></div>
                        </form>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area -->