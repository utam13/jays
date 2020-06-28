<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidangpekerjaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_bidangpekerjaan');
    }

    public function index($page = 1, $isicari = "-", $pesan = "", $isipesan = "")
    {
        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
        }

        if ($cari != "") {
            $q_cari = "nama_bidang like '%$cari%'";
        } else {
            $q_cari = "nama_bidang<>''";
        }

        $data['cari'] =  $cari;

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //pagination
        $jumlah_data = $this->mod_bidangpekerjaan->jumlah_data($q_cari);

        if ($this->input->post('limitpage') == "") {
            $limit = 10;
            $limit_start = ($page - 1) * 10;
        } else {
            $limit = $this->input->post('limitpage');
            $limit_start = ($page - 1) * $limit;
        }

        $data['limit'] = $limit;

        $bidangpekerjaan = $this->mod_bidangpekerjaan->bidangpekerjaan($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($bidangpekerjaan as $bp) {
            $subrecord['kdbidkerja'] = $bp->kdbidkerja;
            $subrecord['nama_bidang'] = $bp->nama_bidang;
            $subrecord['kalimat_slide'] = $bp->kalimat_slide;
            $subrecord['kalimat_singkat'] = $bp->kalimat_singkat;
            $subrecord['font_icon'] = $bp->font_icon;
            $subrecord['jmlpekerjaan']  = $this->mod_bidangpekerjaan->jmlpekerjaan($bp->kdbidkerja);

            if ($bp->gambar_slide != "") {
                $gambar_slide = "upload/" . $bp->gambar_slide;
                if (file_exists($gambar_slide)) {
                    $subrecord['gambar_slide'] = $bp->gambar_slide;
                    $subrecord['nama_file'] = $bp->gambar_slide;
                    $subrecord['file_gambar_slide'] = base_url() . "upload/" . $bp->gambar_slide . "?" . rand();
                } else {
                    $subrecord['gambar_slide'] = "";
                    $subrecord['nama_file'] = date('dmYHis') . "-gambar_slide";
                    $subrecord['file_gambar_slide'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['gambar_slide'] = "";
                $subrecord['nama_file'] = date('dmYHis') . "-gambar_slide";
                $subrecord['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['bidangpekerjaan'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_data;
        $data['jumlah_page'] = ceil($jumlah_data / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];

        $data['no'] = $limit_start + 1;

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/bidangpekerjaan', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses($proses, $kode = "")
    {
        $kdbidkerja = $this->input->post('kode');
        $nama_awal = $this->input->post('nama_awal');
        $nama_bidang = $this->input->post('nama_bidang');
        $kalimat_slide = $this->input->post('kalimat_slide');
        $kalimat_singkat = $this->input->post('kalimat_singkat');
        $font_icon = $this->input->post('font_icon');
        $gambar_slide = $this->input->post('nama_file');

        $data = array(
            "kdbidkerja" => $kdbidkerja,
            "nama_bidang" => $nama_bidang,
            "kalimat_slide" => $kalimat_slide,
            "kalimat_singkat" => $kalimat_singkat,
            "font_icon" => $font_icon,
            "gambar_slide" => $gambar_slide
        );

        $ada = $this->mod_bidangpekerjaan->cek_nama($nama_bidang);

        switch ($proses) {
            case 1:
                if ($ada == 0) {
                    $this->mod_bidangpekerjaan->simpan($data);

                    $pesan = 1;
                    $isipesan = "Bidang Pekerjaan baru ditambahkan";
                } else {
                    $pesan = 4;
                    $isipesan = "Nama Bidang Pekerjaan sudah terdaftar";
                }
                break;
            case 2:
                if ($nama_awal == $nama_awal || ($nama_awal != $nama_bidang && $ada == 0)) {
                    $this->mod_bidangpekerjaan->ubah($data);

                    $pesan = 2;
                    $isipesan = "Bidang Pekerjaan diubah";
                } else {
                    $pesan = 4;
                    $isipesan = "Nama Bidang Pekerjaan sudah terdaftar";
                }
                break;
            case 3:
                $nama = "";
                $data_bidangpekerjaan = $this->mod_bidangpekerjaan->ambil_bidang($kode)->result();
                foreach ($data_bidangpekerjaan as $dbp) {
                    $nama = $dbp->nama_bidang;
                    if ($dbp->gambar_slide != "") {
                        $foto_pegawai = "upload/" . $dbp->gambar_slide;
                        if (file_exists($foto_pegawai)) {
                            unlink("./upload/" . $dbp->gambar_slide);
                        }
                    }
                }

                $this->mod_bidangpekerjaan->hapus($kode);
                $pesan = 3;
                $isipesan = "Bidang Pekerjaan $nama telah dihapus beserta data yang berkaitan dengan bidang pekerjaan tersebut";
                break;
        }
        redirect("bidangpekerjaan/index/1/-/$pesan/$isipesan");
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
