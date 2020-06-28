<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Headslider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_headslider');
    }

    public function index($pesan = "", $isipesan = "")
    {
        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //reset kontent
        $data['kalimatslide1'] = "";
        $data['kalimatslide2'] = "";
        $data['kalimatslide3'] = "";
        $data['gambarslide1'] = date('dmYHis') . "-slide1";
        $data['file_gambarslide1'] = base_url() . "upload/no-image.png" . "?" . rand();
        $data['gambarslide2'] = date('dmYHis') . "-slide2";
        $data['file_gambarslide2'] = base_url() . "upload/no-image.png" . "?" . rand();
        $data['gambarslide3'] = date('dmYHis') . "-slide3";
        $data['file_gambarslide3'] = base_url() . "upload/no-image.png" . "?" . rand();

        $headslider = $this->mod_headslider->headslide()->result();

        foreach ($headslider as $hs) {
            $data['kalimatslide1'] = $hs->kalimatslide1;
            $data['kalimatslide2'] = $hs->kalimatslide2;
            $data['kalimatslide3'] = $hs->kalimatslide3;

            if ($hs->gambarslide1 != "") {
                $gambarslide1 = "upload/" . $hs->gambarslide1;
                if (file_exists($gambarslide1)) {
                    $data['gambarslide1'] = $hs->gambarslide1;
                    $data['file_gambarslide1'] = base_url() . "upload/" . $hs->gambarslide1 . "?" . rand();
                } else {
                    $data['gambarslide1'] = date('dmYHis') . "-slide1";
                    $data['file_gambarslide1'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['gambarslide1'] = date('dmYHis') . "-slide1";
                $data['file_gambarslide1'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($hs->gambarslide2 != "") {
                $gambarslide2 = "upload/" . $hs->gambarslide2;
                if (file_exists($gambarslide2)) {
                    $data['gambarslide2'] = $hs->gambarslide2;
                    $data['file_gambarslide2'] = base_url() . "upload/" . $hs->gambarslide2 . "?" . rand();
                } else {
                    $data['gambarslide2'] = date('dmYHis') . "-slide2";
                    $data['file_gambarslide2'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['gambarslide2'] = date('dmYHis') . "-slide2";
                $data['file_gambarslide2'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($hs->gambarslide3 != "") {
                $gambarslide3 = "upload/" . $hs->gambarslide3;
                if (file_exists($gambarslide3)) {
                    $data['gambarslide3'] = $hs->gambarslide3;
                    $data['file_gambarslide3'] = base_url() . "upload/" . $hs->gambarslide3 . "?" . rand();
                } else {
                    $data['gambarslide3'] = date('dmYHis') . "-slide3";
                    $data['file_gambarslide3'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['gambarslide3'] = date('dmYHis') . "-slide3";
                $data['file_gambarslide3'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/headslider', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses($proses)
    {
        switch ($proses) {
            case 1:
                $kalimat = $this->input->post('kalimatslider1');
                $gambarslide = $this->input->post('nama_file_slide1');
                $namaslide = "Eletrikal &amp; Mekanikal";

                $data = array(
                    "kalimat" => $kalimat,
                    "gambarslide" => $gambarslide
                );

                $this->mod_headslider->hapus1();
                $this->mod_headslider->simpan1($data);
                break;
            case 2:
                $kalimat = $this->input->post('kalimatslider2');
                $gambarslide = $this->input->post('nama_file_slide2');
                $namaslide = "General Supplier";

                $data = array(
                    "kalimat" => $kalimat,
                    "gambarslide" => $gambarslide
                );

                $this->mod_headslider->hapus2();
                $this->mod_headslider->simpan2($data);
                break;
            case 3:
                $kalimat = $this->input->post('kalimatslider3');
                $gambarslide = $this->input->post('nama_file_slide3');
                $namaslide = "Konstruksi";

                $data = array(
                    "kalimat" => $kalimat,
                    "gambarslide" => $gambarslide
                );
                $this->mod_headslider->hapus3();
                $this->mod_headslider->simpan3($data);
                break;
        }

        $pesan = 1;
        $isipesan = "Head Slide $namaslide di-update";

        redirect("headslider/index/$pesan/$isipesan");
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
