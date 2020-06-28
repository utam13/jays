<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_komentar');
    }

    public function index($page = 1, $kode_bidang, $kode_pekerjaan, $isicari = "-", $kategoricari = "-", $pesan = "", $isipesan = "")
    {
        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
            $kategori = $kategoricari;
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
            $kategori =  $this->clear_string->clear_quotes($this->input->post('kategori'));
        }

        if ($cari != "") {
            $q_cari = "kdpekerjaan='$kode_pekerjaan' and $kategori like '%$cari%'";
        } else {
            $q_cari = "kdpekerjaan='$kode_pekerjaan'";
        }

        $data['cari'] =  $cari;

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        $data['kode_bidang'] =  $kode_bidang;
        $data['kode_pekerjaan'] =  $kode_pekerjaan;

        $pekerjaan = $this->mod_komentar->pekerjaan($kode_pekerjaan)->result();
        foreach ($pekerjaan as $p) {
            $data['nama_pekerjaan'] = $p->nama_pekerjaan;
        }

        //pagination
        $jumlah_data = $this->mod_komentar->jumlah_data($q_cari);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $data['limit'] = $limit;

        $komentar = $this->mod_komentar->komentar($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($komentar as $k) {
            $subrecord['kdkomen'] = $k->kdkomen;
            $subrecord['tglkomen'] = $k->tglkomen;
            $subrecord['nama'] = $k->nama;
            $subrecord['email'] = $k->email;
            $subrecord['perusahaan'] = $k->perusahaan;
            $subrecord['komentar'] = $k->komentar;
            $subrecord['kdkomenbalasan'] = $k->kdkomenbalasan;

            array_push($record, $subrecord);
        }
        $data['komentar'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_data;
        $data['jumlah_page'] = ceil($jumlah_data / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];

        $data['no'] = $limit_start + 1;

        $data['halaman'] = "komentar";

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/komentar', $data);
        $this->load->view('body/cms/bodybawah', $data);
    }

    public function proses($proses, $kode = "")
    {
        $kdbidkerja = $this->input->post('kode_bidang_balas');
        $kdpekerjaan = $this->input->post('kode_pekerjaan_balas');
        $nama = $this->clear_string->clear_quotes($this->input->post('nama_balas'));
        $email = $this->input->post('email_balas');
        $perusahaan = $this->input->post('perusahaan_balas');
        $komentar = $this->clear_string->clear_quotes("<b>@" . $this->input->post('balas_ke') . "</b><br>" . $this->input->post('balasan_komentar'));
        $kdkomenbalasan = $this->input->post('kode_komentar');

        if ($proses != 3) {
            $data = array(
                "kdbidkerja" => $kdbidkerja,
                "kdpekerjaan" => $kdpekerjaan,
                "tglkomen" => date('Y-m-d h:i:s'),
                "nama" => $nama,
                "email" => $email,
                "perusahaan" => $perusahaan,
                "komentar" => $komentar,
                "kdkomenbalasan" => $kdkomenbalasan
            );
        }

        switch ($proses) {
            case 1:
                $this->mod_komentar->simpan($data);

                $pesan = 1;
                $isipesan = "Komentar atau Pesan diterima";
                break;
            case 3:
                $balasan = 0;
                $kdbidkerja = "";
                $kdpekerjaan = "";

                $ambil_komentar = $this->mod_komentar->ambil_komentar($kode)->result();
                foreach ($ambil_komentar as $ak) {
                    $balasan = $ak->kdkomenbalasan;
                    $kdbidkerja = $ak->kdbidkerja;
                    $kdpekerjaan = $ak->kdpekerjaan;
                }

                if ($balasan == 0) {
                    $this->mod_komentar->hapus($kode);
                    $this->mod_komentar->hapusbalasan($kode);
                } else {
                    $this->mod_komentar->hapus($kode);
                }

                $pesan = 3;
                $isipesan = "Komentar atau Pesan dihapus";
                break;
        }
        redirect("komentar/index/1/$kdbidkerja/$kdpekerjaan/-/-/$pesan/$isipesan");
    }
}
