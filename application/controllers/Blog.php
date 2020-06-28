<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_blog');
    }

    public function index($page = 1, $kode_bidang, $isicari = "-", $pesanlogin = "")
    {
        $data['page_name'] = "blog";

        $data['kode_bidang'] = $kode_bidang;

        $data['pesanlogin'] = $pesanlogin;

        /*---------------------------------------------------Head Slider-------------------------------------------*/
        $bidang = $this->mod_blog->bidang($kode_bidang)->result();

        foreach ($bidang as $b) {
            $data['kdbidkerja'] = $b->kdbidkerja;
            $data['nama_bidang'] = $b->nama_bidang;
            $data['kalimat_slide'] = $b->kalimat_slide;

            if ($b->gambar_slide != "") {
                $gambar_slide = "upload/" . $b->gambar_slide;
                if (file_exists($gambar_slide)) {
                    $data['file_gambar_slide'] = base_url() . "upload/" . $b->gambar_slide . "?" . rand();
                } else {
                    $data['file_gambar_slide'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_gambar_slide'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }
        /*-------------------------------------end Head Slider-----------------------------------------------------*/

        /*-------------------------------------Posting Terbaru-----------------------------------------------*/
        $posting = $this->mod_blog->posting()->result();

        $record = array();
        $subrecord = array();
        foreach ($posting as $p) {
            $subrecord['kdpekerjaan'] = $p->kdpekerjaan;
            $subrecord['kdbidkerja'] = $p->kdbidkerja;
            $subrecord['nama_pekerjaan'] = $p->nama_pekerjaan;
            $subrecord['pelanggan'] = $p->pelanggan;
            $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();

            $gambar_utama = $this->mod_blog->gambar_utama($p->kdpekerjaan)->result();
            foreach ($gambar_utama as $gu) {
                if ($gu->gambar != "") {
                    $gambar = "upload/" . $gu->gambar;
                    if (file_exists($gambar)) {
                        $subrecord['file_gambar'] = base_url() . "upload/" . $gu->gambar . "?" . rand();
                    }
                }
            }

            array_push($record, $subrecord);
        }
        $data['posting'] = json_encode($record);
        /*--------------------------------end Posting Terbaru------------------------------------------------*/

        /*-------------------------------------Tags-----------------------------------------------*/
        $data['bidang'] = $this->mod_blog->daftar_bidang()->result();
        /*--------------------------------end Tags------------------------------------------------*/

        /*-------------------------------------Tags-----------------------------------------------*/
        $data['tags'] = $this->mod_blog->tags()->result();
        /*--------------------------------end Tags------------------------------------------------*/

        /*--------------------------------------------------Pekerjaan------------------------------------------*/
        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
        }

        if ($cari != "") {
            $q_cari = "nama_pekerjaan like '%$cari%'";
        } else {
            $q_cari = "kdbidkerja='$kode_bidang'";
        }

        $data['cari'] =  $cari;

        $jumlah_data = $this->mod_blog->jumlah_data($q_cari);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $data['limit'] = $limit;

        $pekerjaan = $this->mod_blog->pekerjaan($limit_start, $limit, $q_cari)->result();

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
            $subrecord['jmlkomen'] = $this->mod_blog->jmlkomen($p->kdpekerjaan);

            $gambar_utama = $this->mod_blog->gambar_utama($p->kdpekerjaan)->result();
            foreach ($gambar_utama as $gu) {
                if ($gu->gambar != "") {
                    $gambar = "upload/" . $gu->gambar;
                    if (file_exists($gambar)) {
                        $subrecord['file_gambar'] = base_url() . "upload/" . $gu->gambar . "?" . rand();
                    }
                }
            }

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
        /*-------------------------------------end Pekerjaan-----------------------------------------------------*/

        /*--------------------------------------------------Galeri------------------------------------------*/
        $data['galeri'] = $this->mod_blog->galeri()->result();
        /*-------------------------------------end Galeri-----------------------------------------------------*/

        /*--------------------------------------------------Alamat------------------------------------------*/
        //reset kontent
        $data['telp'] = "";
        $data['fax'] = "";
        $data['email'] = "";
        $data['web'] = "";
        $data['lokasi'] = "";
        $data['kecamatan'] = "";
        $data['propinsi'] = "";
        $data['linkgooglemap'] = "";

        $alamat = $this->mod_blog->alamat()->result();

        foreach ($alamat as $a) {
            $data['telp'] = $a->telp;
            $data['fax'] = $a->fax;
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
        $this->load->view('frontend/blogheader', $data);
        $this->load->view('frontend/blogleft', $data);
        $this->load->view('frontend/blog', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }

    public function detail($page = 1, $kode_bidang, $kode_pekerjaan, $isipesan = "-", $pesanlogin = "")
    {
        $data['page_name'] = "blog";

        $data['kode_bidang'] = $kode_bidang;
        $data['kode_pekerjaan'] = $kode_pekerjaan;
        if ($isipesan != "-") {
            $data['pesan'] = "<script>alert($isipesan)</script>";
        } else {
            $data['pesan'] = "";
        }

        $data['pesanlogin'] = $pesanlogin;

        /*---------------------------------------------------Head Slider-------------------------------------------*/
        $bidang = $this->mod_blog->bidang($kode_bidang)->result();

        foreach ($bidang as $b) {
            $data['kdbidkerja'] = $b->kdbidkerja;
            $data['nama_bidang'] = $b->nama_bidang;
            $data['kalimat_slide'] = $b->kalimat_slide;

            if ($b->gambar_slide != "") {
                $gambar_slide = "upload/" . $b->gambar_slide;
                if (file_exists($gambar_slide)) {
                    $data['file_gambar_slide'] = base_url() . "upload/" . $b->gambar_slide . "?" . rand();
                } else {
                    $data['file_gambar_slide'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_gambar_slide'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }
        /*-------------------------------------end Head Slider-----------------------------------------------------*/

        /*-------------------------------------Posting Terbaru-----------------------------------------------*/
        $posting = $this->mod_blog->posting()->result();

        $record = array();
        $subrecord = array();
        foreach ($posting as $p) {
            $subrecord['kdpekerjaan'] = $p->kdpekerjaan;
            $subrecord['kdbidkerja'] = $p->kdbidkerja;
            $subrecord['nama_pekerjaan'] = $p->nama_pekerjaan;
            $subrecord['pelanggan'] = $p->pelanggan;
            $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();

            $gambar_utama = $this->mod_blog->gambar_utama($p->kdpekerjaan)->result();
            foreach ($gambar_utama as $gu) {
                if ($gu->gambar != "") {
                    $gambar = "upload/" . $gu->gambar;
                    if (file_exists($gambar)) {
                        $subrecord['file_gambar'] = base_url() . "upload/" . $gu->gambar . "?" . rand();
                    }
                }
            }

            array_push($record, $subrecord);
        }
        $data['posting'] = json_encode($record);
        /*--------------------------------end Posting Terbaru------------------------------------------------*/

        /*-------------------------------------Bidang-----------------------------------------------*/
        $data['bidang'] = $this->mod_blog->daftar_bidang()->result();
        /*--------------------------------end Bidang------------------------------------------------*/

        /*-------------------------------------Tags-----------------------------------------------*/
        $data['tags'] = $this->mod_blog->tags()->result();
        /*--------------------------------end Tags------------------------------------------------*/

        /*--------------------------------------------------Pekerjaan------------------------------------------*/
        $detail_pekerjaan = $this->mod_blog->detail_pekerjaan($kode_pekerjaan)->result();

        foreach ($detail_pekerjaan as $p) {
            $data['kdpekerjaan'] = $p->kdpekerjaan;
            $data['kdbidkerja'] = $p->kdbidkerja;
            $data['nama_bidang'] = $p->nama_bidang;
            $data['nama_pekerjaan'] = $p->nama_pekerjaan;
            $data['tgl_mulai'] = $p->tgl_mulai;
            $data['tgl_selesai'] = $p->tgl_selesai;
            $data['lokasi_pekerjaan'] = $p->lokasi;
            $data['pelanggan'] = $p->pelanggan;
            $data['uraian'] = $p->uraian;
            $data['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
            $data['jmlkomen'] = $this->mod_blog->jmlkomen($kode_pekerjaan);

            $gambar_utama = $this->mod_blog->gambar_utama($kode_pekerjaan)->result();
            foreach ($gambar_utama as $gu) {
                if ($gu->gambar != "") {
                    $gambar = "upload/" . $gu->gambar;
                    if (file_exists($gambar)) {
                        $data['file_gambar'] = base_url() . "upload/" . $gu->gambar . "?" . rand();
                    }
                }
            }

            array_push($record, $subrecord);
        }
        /*-------------------------------------end Pekerjaan-----------------------------------------------------*/

        /*--------------------------------------------------Komentar------------------------------------------*/
        $jumlah_komentar = $this->mod_blog->jumlah_data($kode_pekerjaan);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $data['limit'] = $limit;

        //komentar utama
        $komentar_utama = $this->mod_blog->komentar_utama($limit_start, $limit, $kode_pekerjaan)->result();

        $record = array();
        $subrecord = array();
        foreach ($komentar_utama as $ku) {
            $subrecord['kdkomen'] = $ku->kdkomen;
            $subrecord['kdpekerjaan'] = $ku->kdpekerjaan;
            $subrecord['tglkomen'] = $ku->tglkomen;
            $subrecord['nama'] = $ku->nama;
            $subrecord['email'] = $ku->email;
            $subrecord['perusahaan'] = $ku->perusahaan;
            $subrecord['komentar'] = $ku->komentar;
            $subrecord['posisi'] = "";

            //komentar balasan
            $komentar_balasan = $this->mod_blog->komentar_balasan($ku->kdkomen)->result();

            $record2 = array();
            $subrecord2 = array();
            foreach ($komentar_balasan as $kb) {
                $subrecord2['kdkomen'] = $kb->kdkomen;
                $subrecord2['kdpekerjaan'] = $kb->kdpekerjaan;
                $subrecord2['tglkomen'] = $kb->tglkomen;
                $subrecord2['nama'] = $kb->nama;
                $subrecord2['email'] = $kb->email;
                $subrecord2['perusahaan'] = $kb->perusahaan;
                $subrecord2['komentar'] = $kb->komentar;
                $subrecord2['posisi'] = "class='threaded-comments'";

                array_push($record2, $subrecord2);
            }
            $subrecord['balasan'] = json_encode($record2);

            array_push($record, $subrecord);
        }
        $data['komentar'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_komentar;
        $data['jumlah_page'] = ceil($jumlah_komentar / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];
        /*-------------------------------------end Komentar-----------------------------------------------------*/

        /*--------------------------------------------------Galeri Pekerjaan------------------------------------------*/
        $data['galeri_pekerjaan'] = $this->mod_blog->galeri_perkerjaan($kode_pekerjaan)->result();
        /*-------------------------------------end Galeri-----------------------------------------------------*/

        /*--------------------------------------------------Galeri------------------------------------------*/
        $data['galeri'] = $this->mod_blog->galeri()->result();
        /*-------------------------------------end Galeri-----------------------------------------------------*/

        /*--------------------------------------------------Alamat------------------------------------------*/
        //reset kontent
        $data['telp'] = "";
        $data['fax'] = "";
        $data['email'] = "";
        $data['web'] = "";
        $data['lokasi'] = "";
        $data['kecamatan'] = "";
        $data['propinsi'] = "";
        $data['linkgooglemap'] = "";

        $alamat = $this->mod_blog->alamat()->result();

        foreach ($alamat as $a) {
            $data['telp'] = $a->telp;
            $data['fax'] = $a->fax;
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
        $this->load->view('frontend/blogheader', $data);
        $this->load->view('frontend/blogleft', $data);
        $this->load->view('frontend/detail', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }

    public function komentar($proses, $kode = "")
    {
        switch ($proses) {
            case 1:
                $kdbidkerja = $this->input->post('kode_bidang');
                $kdpekerjaan = $this->input->post('kode_pekerjaan');
                $nama = $this->clear_string->clear_quotes($this->input->post('nama'));
                $email = $this->input->post('email');
                $perusahaan = $this->input->post('perusahaan');
                $komentar = $this->input->post('komentar');
                $kdkomenbalasan = 0;
                break;
            case 2:
                $kdbidkerja = $this->input->post('kode_bidang_balas');
                $kdpekerjaan = $this->input->post('kode_pekerjaan_balas');
                $nama = $this->clear_string->clear_quotes($this->input->post('nama_balas'));
                $email = $this->input->post('email_balas');
                $perusahaan = $this->input->post('perusahaan_balas');
                $komentar = $this->clear_string->clear_quotes("<b>@" . $this->input->post('balas_ke') . "</b><br>" . $this->input->post('balasan_komentar'));
                $kdkomenbalasan = $this->input->post('kode_komentar');
                break;
        }

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

        $this->mod_blog->simpankomen($data);

        $isipesan = "Komentar/Pesan Anda diterima";

        redirect("blog/detail/1/$kdbidkerja/$kdpekerjaan/$isipesan#$kdkomenbalasan");
    }
}
