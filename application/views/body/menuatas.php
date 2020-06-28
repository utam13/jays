<body data-spy="scroll" data-target="#navbar-example">
    <!--
    <div id="preloader"></div>
    -->
    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <!-- Navigation -->
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Brand -->
                                <a class="navbar-brand page-scroll sticky-logo" href="#" style="margin-top:10px;">
                                    <h1>PT. JAYS ZAHARA MANDIRI</h1>
                                    <!-- Uncomment below if you prefer to use an image logo -->
                                    <!-- <img src="img/logo.png" alt="" title=""> -->
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                                <ul class="nav navbar-nav navbar-right">
                                    <?
                                    if ($page_name == "landing") {
                                    ?>
                                        <li>
                                            <a class="page-scroll" href="#beranda">Beranda</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#tentangkami">Tentang Kami</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#bidangpekerjaan">Bidang</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#galeri">Galeri</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#blog">Pekerjaan</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="#kontak">Kontak</a>
                                        </li>
                                    <? } else { ?>
                                        <li>
                                            <a class="page-scroll" href="<?= base_url(); ?>#beranda">Beranda</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="<?= base_url(); ?>#tentangkami">Tentang Kami</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="<?= base_url(); ?>#bidangpekerjaan">Bidang</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="<?= base_url(); ?>#galeri">Galeri</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="<?= base_url(); ?>#blog">Pekerjaan</a>
                                        </li>
                                        <li>
                                            <a class="page-scroll" href="<?= base_url(); ?>#kontak">Kontak</a>
                                        </li>
                                    <? } ?>
                                </ul>
                            </div>
                            <!-- navbar-collapse -->
                        </nav>
                        <!-- END: Navigation -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
    </header>
    <!-- header end -->