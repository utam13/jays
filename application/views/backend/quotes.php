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
                        Quotes
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?= base_url(); ?>quotes/proses">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kalimat Quotes 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="quotes1" name="quotes1" value="<?= $quotes1; ?>" maxlength=200 placeholder="Kalimat Quotes 1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Quotes 1 Oleh</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="oleh1" name="oleh1" value="<?= $oleh1; ?>" maxlength=100 placeholder="Pemilik Quotes 1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kalimat Quotes 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="quotes2" name="quotes2" value="<?= $quotes2; ?>" maxlength=200 placeholder="Kalimat Quotes 2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Quotes 2 Oleh</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="oleh2" name="oleh2" value="<?= $oleh2; ?>" maxlength=100 placeholder="Pemilik Quotes 2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kalimat Quotes 3</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="quotes3" name="quotes3" value="<?= $quotes3; ?>" maxlength=200 placeholder="Kalimat Quotes 3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Quotes 3 Oleh</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="oleh3" name="oleh3" value="<?= $oleh3; ?>" maxlength=100 placeholder="Pemilik Quotes 3">
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>" target="_blank" class="btn btn-success">Show</a>
                        <button type="submit" class="btn btn-primary pull-right">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->