<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_pekerjaan');
    }

    public function index($page = 1, $kode_bidang, $isicari = "-", $pesan = "", $isipesan = "")
    {
        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
        }

        if ($cari != "") {
            $q_cari = "kdbidkerja='$kode_bidang' and nama_pekerjaan like '%$cari%'";
        } else {
            $q_cari = "kdbidkerja='$kode_bidang'";
        }

        $data['cari'] =  $cari;

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        $data['kode_bidang'] =  $kode_bidang;

        $bidangpekerjaan = $this->mod_pekerjaan->bidangpekerjaan($kode_bidang)->result();
        foreach ($bidangpekerjaan as $bp) {
            $data['nama_bidang'] = $bp->nama_bidang;
        }

        //pagination
        $jumlah_data = $this->mod_pekerjaan->jumlah_data($q_cari);

        if ($this->input->post('limitpage') == "") {
            $limit = 10;
            $limit_start = ($page - 1) * 10;
        } else {
            $limit = $this->input->post('limitpage');
            $limit_start = ($page - 1) * $limit;
        }

        $data['limit'] = $limit;

        $pekerjaan = $this->mod_pekerjaan->pekerjaan($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($pekerjaan as $p) {
            $subrecord['kdpekerjaan'] = $p->kdpekerjaan;
            $subrecord['kdbidkerja'] = $p->kdbidkerja;
            $subrecord['nama_pekerjaan'] = $p->nama_pekerjaan;
            $subrecord['tgl_mulai'] = $p->tgl_mulai;
            $subrecord['tgl_selesai'] = $p->tgl_selesai;
            $subrecord['lokasi'] = $p->lokasi;
            $subrecord['pelanggan'] = $p->pelanggan;
            $subrecord['uraian'] = $p->uraian;

            $subrecord['jmlkomen'] = $this->mod_pekerjaan->jmlkomen($p->kdpekerjaan);

            array_push($record, $subrecord);
        }
        $data['pekerjaan'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_data;
        $data['jumlah_page'] = ceil($jumlah_data / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];

        $data['no'] = $limit_start + 1;

        $data['halaman'] = "pekerjaan";

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/pekerjaan', $data);
        $this->load->view('body/cms/bodybawah2', $data);
    }

    public function proses($proses, $kode = "")
    {
        $kdpekerjaan = $this->input->post('kode');
        $kdbidkerja = $this->input->post('kode_bidang');
        $nama_pekerjaan = $this->input->post('nama_pekerjaan');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $lokasi = $this->input->post('lokasi');
        $pelanggan = $this->input->post('pelanggan');
        $uraian = $this->clear_string->clear_quotes($this->input->post('uraian_pekerjaan'));

        $data = array(
            "kdpekerjaan" => $kdpekerjaan,
            "kdbidkerja" => $kdbidkerja,
            "nama_pekerjaan" => $nama_pekerjaan,
            "tgl_mulai" => $tgl_mulai,
            "tgl_selesai" => $tgl_selesai,
            "lokasi" => $lokasi,
            "pelanggan" => $pelanggan,
            "uraian" => $uraian
        );

        //echo print_r($data);

        $nama_tags = explode(' ', $nama_pekerjaan);
        foreach ($nama_tags as $nt) {
            $tags = trim($nt);

            $cek_tags = $this->mod_pekerjaan->cek_tags($tags);
            if ($cek_tags == 0) {
                $this->mod_pekerjaan->simpan_tags($tags);
            }
        }

        switch ($proses) {
            case 1:
                $this->mod_pekerjaan->simpan($data);

                $pesan = 1;
                $isipesan = "Pekerjaan baru ditambahkan";
                break;
            case 2:
                $this->mod_pekerjaan->ubah($data);

                $pesan = 2;
                $isipesan = "Pekerjaan diubah";
                break;
            case 3:
                $nama = "";
                $kdbidkerja = "";
                $data_pekerjaan = $this->mod_pekerjaan->ambil_pekerjaan($kode)->result();
                foreach ($data_pekerjaan as $dp) {
                    $kdbidkerja = $dp->kdbidkerja;
                    $nama = $dp->nama_pekerjaan;
                }

                $data_galeri = $this->mod_pekerjaan->ambil_galeri($kode)->result();
                foreach ($data_galeri as $dg) {
                    if ($dg->gambar != "") {
                        $gambar = "upload/" . $dg->gambar;
                        if (file_exists($gambar)) {
                            unlink("./upload/" . $dg->gambar);
                        }
                    }
                }

                $this->mod_pekerjaan->hapus($kode);
                $pesan = 3;
                $isipesan = "Pekerjaan $nama telah dihapus beserta data yang berkaitan dengan pekerjaan tersebut";
                break;
        }

        redirect("pekerjaan/index/1/$kdbidkerja/-/$pesan/$isipesan");
    }
}
