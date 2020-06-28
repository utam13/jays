<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_galeri');
    }

    public function index($page = 1, $kode_pekerjaan, $pesan = "", $isipesan = "")
    {
        $q_cari = "kdpekerjaan='$kode_pekerjaan'";

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        $data['kode_pekerjaan'] =  $kode_pekerjaan;

        $pekerjaan = $this->mod_galeri->pekerjaan($kode_pekerjaan)->result();
        foreach ($pekerjaan as $p) {
            $data['kdbidkerja'] = $p->kdbidkerja;
            $data['nama_pekerjaan'] = $p->nama_pekerjaan;
        }

        //pagination
        $jumlah_data = $this->mod_galeri->jumlah_data($q_cari);

        if ($this->input->post('limitpage') == "") {
            $limit = 10;
            $limit_start = ($page - 1) * 10;
        } else {
            $limit = $this->input->post('limitpage');
            $limit_start = ($page - 1) * $limit;
        }

        $data['limit'] = $limit;

        $galeri = $this->mod_galeri->galeri($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($galeri as $g) {
            $subrecord['kdgaleri'] = $g->kdgaleri;
            $subrecord['kdpekerjaan'] = $g->kdpekerjaan;
            $subrecord['utama'] = $g->utama;

            if ($g->gambar != "") {
                $gambar = "upload/" . $g->gambar;
                if (file_exists($gambar)) {
                    $subrecord['file_gambar'] = base_url() . "upload/" . $g->gambar . "?" . rand();
                } else {
                    $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
            array_push($record, $subrecord);
        }
        $data['galeri'] = json_encode($record);

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/galeri', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses($proses, $kode = "")
    {
        $kdpekerjaan = $this->input->post('kode_pekerjaan');
        $gambar = $this->input->post('nama_file');
        $utama = $this->input->post('utama', true) == null ? 0 : 1;

        $data = array(
            "kdpekerjaan" => $kdpekerjaan,
            "gambar" => $gambar,
            "utama" => $utama
        );

        switch ($proses) {
            case 1:
                if ($utama == 1) {
                    $this->mod_galeri->bersihkan_utama($kdpekerjaan);
                }

                $this->mod_galeri->simpan($data);

                $pesan = 1;
                $isipesan = "Gambar Galeri pekerjaan ditambahkan";
                break;
            case 2:
                $data_galeri = $this->mod_galeri->ambil_galeri($kode)->result();
                foreach ($data_galeri as $dg) {
                    $kdpekerjaan = $dg->kdpekerjaan;
                    $this->mod_galeri->bersihkan_utama($dg->kdpekerjaan);
                }

                $this->mod_galeri->utama($kode);

                $pesan = 1;
                $isipesan = "Data Gambar Galeri pekerjaan diubah";
                break;
            case 3:
                $data_galeri = $this->mod_galeri->ambil_galeri($kode)->result();
                foreach ($data_galeri as $dg) {
                    $kdpekerjaan = $dg->kdpekerjaan;

                    if ($dg->gambar != "") {
                        $gambar = "upload/" . $dg->gambar;
                        if (file_exists($gambar)) {
                            unlink("./upload/" . $dg->gambar);
                        }
                    }
                }

                $this->mod_galeri->hapus($kode);

                $pesan = 3;
                $isipesan = "Gambar Galeri pekerjaan dihapus";
                break;
        }

        redirect("galeri/index/1/$kdpekerjaan/$pesan/$isipesan");
    }

    public function upload($nama_file)
    {
        $config['upload_path']        = './upload';
        $config['allowed_types']     = 'gif|jpg|png|bmp';
        $config['file_name']        = $nama_file;
        $config['overwrite']        = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas')) {
            $error = "";
            echo "gagal";
        } else {
            $data = $this->upload->data();

            extract($data);

            echo $file_name;
        }
    }
}
