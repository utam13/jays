//lihat password
function lihatpassword() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
		$("#iconlihat").removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	} else {
		x.type = "password";
		$("#iconlihat").removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	}
}

//tampilkan loading indikator
function showloading() {
	$("#divloading").css("display", "block");
}

/*----------------------------upload file---------------------------------*/

/*----------upload logo----------*/
function upload_logo() {
	$("#pilih").click();
}

$('#pilih').change(function () {
	if (this.files[0] != "") {
		if (this.files[0].size > 500000) {
			alert("Ukuran file melebihi 5 Kb!");
		} else {
			$("#btnlihat").hide();
			$("#progress_div").show();
			$("#progress_bar").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file").val();
			var lokasi = $("#lokasi").val();
			var target_proses = lokasi + "alamat/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandlerLogo, false);
			ajax.addEventListener("load", completeHandlerLogo, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}
	}
})

function progressHandlerLogo(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar").css("width", Math.round(percent) + "%");
}

function completeHandlerLogo(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div").hide();
		$("#nama_file").val(nama_file);
		$("#file_target").val(nama_file);
		$("#linklogo").attr("href", berkas);
		$("#btnlihat").show();
	}
}
/*---------end upload logo--------*/

/*----------upload slide----------*/
function upload_slide() {
	$("#pilih_slide").click();
}

$('#pilih_slide').change(function () {
	if (this.files[0] != "") {
		//var image = new Image();
		//image.src = this.files[0];

		var size = this.files[0].size;
		//var realWidth = image.naturalWidth;
		//var realHeight = image.naturalHeight;

		//alert("Ukuran " + realWidth + "x" + realHeight);

		if (size > 2000000) {
			alert("Ukuran file melebihi 2 Mb!");
		} else {
			$("#btnlihat").hide();
			$("#progress_div").show();
			$("#progress_bar").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file").val();
			var lokasi = $("#lokasi").val();
			var target_proses = lokasi + "bidangpekerjaan/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandlerslide, false);
			ajax.addEventListener("load", completeHandlerslide, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}

	}
})

function progressHandlerslide(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar").css("width", Math.round(percent) + "%");
}

function completeHandlerslide(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div").hide();
		$("#nama_file").val(nama_file);
		$("#file_target").val(nama_file);
		$("#linkslide").attr("href", berkas);
		$("#btnlihat").show();
	}
}
/*---------end upload slide--------*/

/*----------upload galeri----------*/
function upload_galeri() {
	$("#pilih_galeri").click();
}

$('#pilih_galeri').change(function () {
	if (this.files[0] != "") {
		var size = this.files[0].size;
		if (size > 1000000) {
			alert("Ukuran file melebihi 1 Mb!");
		} else {
			$("#btnlihat").hide();
			$("#progress_div").show();
			$("#progress_bar").attr("aria-valuenow", 0);

			var nama_file = $("#nama_file").val();
			var lokasi = $("#lokasi").val();
			var target_proses = lokasi + "galeri/upload/" + nama_file;

			var formdata = new FormData();
			formdata.append("berkas", this.files[0]);
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandlergaleri, false);
			ajax.addEventListener("load", completeHandlergaleri, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			ajax.open("POST", target_proses);
			ajax.send(formdata);
		}

	}
})

function progressHandlergaleri(event) {
	var percent = (event.loaded / event.total) * 100;
	$("#progress_bar").css("width", Math.round(percent) + "%");
}

function completeHandlergaleri(event) {
	var nama_file = event.target.responseText;
	var lokasi = $("#lokasi").val();
	var berkas = lokasi + "upload/" + nama_file + "?" + Math.random();

	if (nama_file == "gagal") {
		$("#progress_div").hide();

		alert("Gagal upload file, silakan coba upload file dengan format atau ukuran yang berbeda");
	} else {
		$("#progress_div").hide();
		$("#nama_file").val(nama_file);
		$("#file_target").val(nama_file);
		$("#linkgaleri").attr("href", berkas);
		$("#btnlihat").show();
	}
}
/*---------end upload galeri--------*/

function errorHandler(event) {
	alert("Upload Failed");
}

function abortHandler(event) {
	alert("Upload Aborted");
}

//bidang pekerjaan----------------------------------------------------------------------
function ambil_bidang(a, kode, nama_bidang, kalimat_slide, kalimat_singkat, font_icon, gambar_slide, file_target) {
	$("#frm_bidangpekerjaan").attr("action", a);

	$("#kode").val(kode);
	$("#nama_awal").val(nama_bidang);
	$("#nama_bidang").val(nama_bidang);
	$("#kalimat_slide").val(kalimat_slide);
	$("#kalimat_singkat").val(kalimat_singkat);
	$("#font_icon").val(font_icon);
	$("#nama_file").val(gambar_slide);
	$("#file_target").val(file_target);
}

$('#form_bidangpekerjaan').on('shown.bs.modal', function () {
	$('#nama_bidang').focus();
})

$('#nama_bidang').change(function () {
	var value = $(this).val();

	if (value.indexOf('\'') >= 0 || value.indexOf('"') >= 0) {
		alert("Nama barang TIDAK BOLEH ada tanda petik ganda atau pun petik tunggal");
		$('#nama_bidang').val("");
		$('#nama_bidang').focus();
	}
});
/*--------------------------------------end--------------------------------------------*/

//pekerjaan----------------------------------------------------------------------
function ambil_pekerjaan(a, kode_bidang, kode_pekerjaan, nama_pekerjaan, tgl_mulai, tgl_selesai, lokasi, pelanggan, uraian) {
	$("#frm_pekerjaan").attr("action", a);

	$("#kode").val(kode_pekerjaan);
	$("#kode_bidang").val(kode_bidang);
	$("#nama_pekerjaan").val(nama_pekerjaan);
	$("#tgl_mulai").val(tgl_mulai);
	$("#tgl_selesai").val(tgl_selesai);
	$("#lokasi").val(lokasi);
	$("#pelanggan").val(pelanggan);
	//$("#uraian_pekerjaan").val(uraian);
	CKEDITOR.instances['uraian_pekerjaan'].setData(uraian);
}

function ambil_pekerjaan2(a, kode_bidang, kode_pekerjaan, nama_pekerjaan, tgl_mulai, tgl_selesai, lokasi, pelanggan) {
	alert("get data");
}

$('#form_pekerjaan').on('shown.bs.modal', function () {
	$('#nama_pekerjaan').focus();
})

$('#nama_pekerjaan').change(function () {
	var value = $(this).val();

	if (value.indexOf('\'') >= 0 || value.indexOf('"') >= 0) {
		alert("Nama barang TIDAK BOLEH ada tanda petik ganda atau pun petik tunggal");
		$('#nama_pekerjaan').val("");
		$('#nama_pekerjaan').focus();
	}
});
/*--------------------------------------end--------------------------------------------*/

//balasan komentar---------------------------------------------------------------------
function ambil_komen(kode, nama, perusahaan) {
	var kepada = "";

	$('#kode_komentar').val(kode);
	if (perusahaan != "") {
		kepada = nama + " dari " + perusahaan;
	} else {
		kepada = nama;
	}
	$("#kepada").html("balas ke " + kepada);
	$('#balas_ke').val(kepada);
}

$('#form_balas').on('shown.bs.modal', function () {
	$('#nama_balas').focus();
})
/*--------------------------------------end--------------------------------------------*/
