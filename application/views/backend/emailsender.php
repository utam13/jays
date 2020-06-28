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
                        Pengaturan Email Sender
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?= base_url(); ?>emailsender/proses">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Host</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="host" name="host" value="<?= $host; ?>" maxlength=100 placeholder="Host" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="alamat_email" name="alamat_email" value="<?= $email; ?>" maxlength=100 placeholder="Alamat Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password" value="<?= $password; ?>" maxlength=100 placeholder="Password Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Port</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="port" name="port" value="<?= $port; ?>" min=1 max=999 placeholder="Port" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="ssl" id="ssl" value="0" <?= $aktif_ssl; ?>>
                                        Menggunakan SSL
                                    </label>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#testingemail">Testing Kirim Email</a>
                        <button type="submit" class="btn btn-primary pull-right">Simpan Pengaturan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/Center Column-->
</div>
<!--/container-fluid-->

<!-- Modal -->
<div class="modal fade" id="testingemail" tabindex="-1" role="dialog" aria-labelledby="testingemailLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testingemailLabel">Testing Kirim Email</h5>
            </div>
            <form method="POST" action="<?= base_url(); ?>emailsender/teskirim">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ketikkan Email Tujuan</label>
                        <input type="email" class="form-control" id="email_testing" name="email_testing" value="" maxlength=100 placeholder="Email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->