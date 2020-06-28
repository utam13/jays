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
                        Tentang Kami
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?= base_url(); ?>tentangkami/proses">
                        <div class="form-group">
                            <textarea id="uraian" name="uraian" required><?= $uraian; ?></textarea>
                        </div>
                        <a href="<?= base_url(); ?>" target="_blank" class="btn btn-default">Lihat Tampilan</a>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->