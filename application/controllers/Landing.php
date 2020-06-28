<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_landing');
    }

    public function index($page_galeri = 1, $page_pekerjaan = 1, $isicari_galeri = "-", $pesanlogin = "")
    {
        $data['page_name'] = "landing";
        $data['page_galeri'] = $page_galeri;
        $data['page_pekerjaan'] = $page_pekerjaan;

        $data['pesanlogin'] = $pesanlogin;

        /*---------------------------------------------------Head Slider-------------------------------------------*/
        $slide = $this->mod_landing->slide()->result();

        $record = array();
        $subrecord = array();
        $no_slide = 1;
        foreach ($slide as $s) {
            $subrecord['no_slide'] = $no_slide;
            $subrecord['kdbidkerja'] = $s->kdbidkerja;
            $subrecord['nama_bidang'] = $s->nama_bidang;
            $subrecord['kalimat_slide'] = $s->kalimat_slide;
            $subrecord['kalimat_singkat'] = $s->kalimat_singkat;
            $subrecord['font_icon'] = $s->font_icon;

            if ($s->gambar_slide != "") {
                $gambar_slide = "upload/" . $s->gambar_slide;
                if (file_exists($gambar_slide)) {
                    $subrecord['file_gambar_slide'] = base_url() . "upload/" . $s->gambar_slide . "?" . rand();
                } else {
                    $subrecord['file_gambar_slide'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['file_gambar_slide'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            $subrecord['ada_pekerjaan'] = $this->mod_landing->ada_pekerjaan($s->kdbidkerja);

            $subrecord['ada_galeri'] = $this->mod_landing->ada_galeri($s->kdbidkerja);

            $no_slide++;

            array_push($record, $subrecord);
        }
        $data['slide'] = json_encode($record);

        $jml_slide = $no_slide - 1;

        switch ($jml_slide) {
            case 1:
                $data['ukuran_bidangpekerjaan'] = "col-md-12 col-sm-12";
                $jmlrekam_pekerjaan = 3;
                break;
            case 2:
                $data['ukuran_bidangpekerjaan'] = "col-md-6 col-sm-6";
                $jmlrekam_pekerjaan = 1;
                break;
            default:
                $data['ukuran_bidangpekerjaan'] = "col-md-4 col-sm-4";
                $jmlrekam_pekerjaan = 1;
                break;
        }
        /*-------------------------------------end Head Slider-----------------------------------------------------*/

        /*--------------------------------------------------Tentang Kami------------------------------------------*/
        //reset kontent
        $data['tentangkami'] = "";

        $tentangkami = $this->mod_landing->tentangkami()->result();

        foreach ($tentangkami as $tk) {
            $data['tentangkami'] = $tk->uraian;
        }
        /*-------------------------------------end Tentang Kami-----------------------------------------------------*/

        /*--------------------------------------------------Galeri------------------------------------------*/
        if ($isicari_galeri != "-") {
            $q_cari_galeri = "b.kdbidkerja='$isicari_galeri'";
        } else {
            $q_cari_galeri = "b.kdbidkerja<>''";
        }

        $data['cari_galeri'] =  $isicari_galeri;

        $jumlah_data_galeri = $this->mod_landing->jumlah_data_galeri($q_cari_galeri);

        $limit_galeri = 6;
        $limit_start_galeri = ($page_galeri - 1) * 6;

        $data['limit_galeri'] = $limit_galeri;

        $galeri = $this->mod_landing->galeri($limit_start_galeri, $limit_galeri, $q_cari_galeri)->result();

        $record = array();
        $subrecord = array();
        foreach ($galeri as $g) {
            $subrecord['nama_pekerjaan'] = $g->nama_pekerjaan;
            $subrecord['pelanggan'] = $g->pelanggan;
            $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();

            if ($g->gambar != "") {
                $gambar = "upload/" . $g->gambar;
                if (file_exists($gambar)) {
                    $subrecord['file_gambar'] = base_url() . "upload/" . $g->gambar . "?" . rand();
                }
            }

            array_push($record, $subrecord);
        }
        $data['galeri'] = json_encode($record);

        $data['page_galeri'] = $page_galeri;
        $data['limit_galeri'] = $limit_galeri;
        $data['get_jumlah_galeri'] = $jumlah_data_galeri;
        $data['jumlah_page_galeri'] = ceil($jumlah_data_galeri / $limit_galeri);
        $data['jumlah_number_galeri'] = 2;
        $data['start_number_galeri'] = ($page_galeri > $data['jumlah_number_galeri']) ? $page_galeri - $data['jumlah_number_galeri'] : 1;
        $data['end_number_galeri'] = ($page_galeri < ($data['jumlah_page_galeri'] - $data['jumlah_number_galeri'])) ? $page_galeri + $data['jumlah_number_galeri'] : $data['jumlah_page_galeri'];
        /*-------------------------------------end Galeri-----------------------------------------------------*/

        /*--------------------------------------------------Galeri------------------------------------------*/
        $data['galeri2'] = $this->mod_landing->galeri2()->result();
        /*-------------------------------------end Galeri-----------------------------------------------------*/

        /*--------------------------------------------------Pekerjaan------------------------------------------*/
        $jumlah_data_pekerjaan = $this->mod_landing->jumlah_data_pekerjaan();

        $limit_pekerjaan = 3;
        $limit_start_pekerjaan = ($page_pekerjaan - 1) * 3;

        $data['limit_pekerjaan'] = $limit_pekerjaan;

        $pekerjaan = $this->mod_landing->pekerjaan($limit_start_pekerjaan, $limit_pekerjaan)->result();

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
            $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
            $subrecord['ada_galeri_pekerjaan'] = $this->mod_landing->ada_galeri_pekerjaan($p->kdpekerjaan);
            $subrecord['jmlkomen'] = $this->mod_landing->jmlkomen($p->kdpekerjaan);

            if ($subrecord['ada_galeri_pekerjaan'] != 0) {
                $gambar_utama = $this->mod_landing->gambar_utama($p->kdpekerjaan)->result();
                foreach ($gambar_utama as $gu) {
                    if ($gu->gambar != "") {
                        $gambar = "upload/" . $gu->gambar;
                        if (file_exists($gambar)) {
                            $subrecord['file_gambar'] = base_url() . "upload/" . $gu->gambar . "?" . rand();
                        }
                    }
                }
            }

            array_push($record, $subrecord);
        }
        $data['pekerjaan'] = json_encode($record);

        $data['page_pekerjaan'] = $page_pekerjaan;
        $data['limit_pekerjaan'] = $limit_pekerjaan;
        $data['get_jumlah_pekerjaan'] = $jumlah_data_pekerjaan;
        $data['jumlah_page_pekerjaan'] = ceil($jumlah_data_pekerjaan / $limit_pekerjaan);
        $data['jumlah_number_pekerjaan'] = 2;
        $data['start_number_pekerjaan'] = ($page_pekerjaan > $data['jumlah_number_pekerjaan']) ? $page_pekerjaan - $data['jumlah_number_pekerjaan'] : 1;
        $data['end_number_pekerjaan'] = ($page_pekerjaan < ($data['jumlah_page_pekerjaan'] - $data['jumlah_number_pekerjaan'])) ? $page_pekerjaan + $data['jumlah_number_pekerjaan'] : $data['jumlah_page_pekerjaan'];
        /*-------------------------------------end Pekerjaan-----------------------------------------------------*/

        /*--------------------------------------------------Alamat------------------------------------------*/
        //reset kontent
        $data['telp'] = "";
        $data['fax'] = "";
        $data['wa'] = "";
        $data['email'] = "";
        $data['web'] = "";
        $data['lokasi'] = "";
        $data['kecamatan'] = "";
        $data['propinsi'] = "";
        $data['linkgooglemap'] = "";

        $alamat = $this->mod_landing->alamat()->result();

        foreach ($alamat as $a) {
            $data['telp'] = $a->telp;
            $data['fax'] = $a->fax;
            $data['wa'] = $a->wa;
            $data['email'] = $a->email;
            $data['web'] = $a->web;
            $data['lokasi'] = $a->lokasi;
            $data['kecamatan'] = $a->kecamatan;
            $data['propinsi'] = $a->propinsi;
            $data['link_googlemap'] = $a->link_googlemap;
            $data['link_facebook'] = $a->link_facebook;
            $data['link_ig'] = $a->link_ig;
            $data['link_twitter'] = $a->link_twitter;
            $data['link_youtube'] = $a->link_youtube;

            if ($a->logo != "") {
                $logo = "upload/" . $a->logo;
                if (file_exists($logo)) {
                    $data['file_logo'] = base_url() . "upload/" . $a->logo . "?" . rand();
                } else {
                    $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }
        /*-------------------------------------end Alamat-----------------------------------------------------*/

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/landing', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }

    public function kirimpesan()
    {
        $nama = $this->input->post('name');
        $email = $this->input->post('email');
        $subjek = $this->input->post('subject');
        $pesan = "Nama: " . $nama . "<br>Email: " . $email . "<br>Pesan: <br>" . $this->input->post('message');
        $email_perusahaan = $this->input->post('email_perusahaan');

        $proses = $this->kirim_email->email($email_perusahaan, $subjek, $pesan);

        if ($proses == "Email berhasil dikirim") {
            echo "OK";
        } else {
            echo $proses;
        }
    }
}
