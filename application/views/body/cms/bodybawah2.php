<footer>
    <div class="small-print">
        <div class="container">
            <p>CMS for PT Jayz Zahara Mandiri</p>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="<?= base_url(); ?>assets/cms/js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url(); ?>assets/cms/js/bootstrap.min.js"></script>

<!-- IE10 viewport bug workaround -->
<script src="<?= base_url(); ?>assets/cms/js/ie10-viewport-bug-workaround.js"></script>

<!-- Placeholder Images -->
<script src="<?= base_url(); ?>assets/cms/js/holder.min.js"></script>

<!-- CK Editor -->
<script src="<?= base_url() ?>assets/cms/ckeditor/ckeditor.js"></script>

<!-- Editor -->
<script src="<?= base_url(); ?>assets/cms/js/editor.js"></script>

<? if ($halaman == "tentang") { ?>
    <script src="<?= base_url(); ?>assets/cms/js/uraian.js"></script>
<? } ?>

<? if ($halaman == "pekerjaan") { ?>
    <script src="<?= base_url(); ?>assets/cms/js/uraian_pekerjaan.js"></script>
<? } ?>

<!-- Javascript Action Tambahan -->
<script src="<?= base_url(); ?>assets/cms/js/aksi.js"></script>

</body>

</html>