<!-- Start Footer bottom Area -->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo text-center">
                                <h2><small style="font-weight:bold;color:#000000;">PT. JAYS ZAHARA MANDIRI</small></h2>
                            </div>

                            <p class="text-center">
                                <img src="<?= $file_logo; ?>" style="width:200px;">
                            </p>
                            <div class="footer-icons">
                                <ul>
                                    <? if ($link_facebook != "") { ?>
                                        <li>
                                            <a href="<?= $link_facebook; ?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                    <? } ?>
                                    <? if ($link_ig != "") { ?>
                                        <li>
                                            <a href="<?= $link_ig; ?>"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    <? } ?>
                                    <? if ($link_twitter != "") { ?>
                                        <li>
                                            <a href="<?= $link_twitter; ?>"><i class="fa fa-twitter"></i></a>
                                        </li>
                                    <? } ?>
                                    <? if ($link_youtube != "") { ?>
                                        <li>
                                            <a href="<?= $link_youtube; ?>"><i class="fa fa-youtube"></i></a>
                                        </li>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Informasi</h4>
                            <p>
                                <?= $lokasi; ?><br>
                                <?= $kecamatan; ?>, <?= $propinsi; ?>
                            </p>
                            <div class="footer-contacts">
                                <p><span>Tel:</span> <?= $telp; ?></p>
                                <p><span>Email:</span> <?= $email; ?></p>
                                <p><span>Working Hours:</span> office hour</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?
                                    $no = 1;

                                    if ($page_name == "landing") {
                                        $daftar_galeri = $galeri2;
                                    } else {
                                        $daftar_galeri = $galeri;
                                    }
                                    foreach ($daftar_galeri as $dg) {
                                        $file = base_url() . "upload/" . $dg->gambar;
                                    ?>
                                        <div class="item <? if ($no == 1) {
                                                                echo "active";
                                                            } ?>">
                                            <img src="<?= $file; ?>" alt="#">
                                        </div>
                                    <? $no++;
                                    } ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <p>
                            PT. Jays Zahara Mandiri
                        </p>
                    </div>
                    <div class="credits">
                        <a href="#myModal" data-toggle="modal">Manage Content</a>
                        <!--
                        All the links in the footer should remain intact.
                        You can delete the links only if you purchased the pro version.
                        Licensing information: https://bootstrapmade.com/license/
                        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
                        -->
                        <!--Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="<?= base_url(); ?>assets/img/avatar.png" alt="Avatar">
                </div>
                <h4 class="modal-title">CMS Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>login/proses/1" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url(); ?>login/reset/<?= $email; ?>">Lupa Password?</a>
            </div>
        </div>
    </div>
</div>