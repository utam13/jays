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
