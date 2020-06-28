<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alamat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_alamat');
    }

    public function index($pesan = "", $isipesan = "")
    {
        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //reset kontent
        $data['telp'] = "";
        $data['fax'] = "";
        $data['wa'] = "";
        $data['email'] = "";
        $data['web'] = "";
        $data['lokasi'] = "";
        $data['kecamatan'] = "";
        $data['propinsi'] = "";
        $data['link_googlemap'] = "";
        $data['link_facebook'] = "";
        $data['link_ig'] = "";
        $data['link_twitter'] = "";
        $data['link_youtube'] = "";
        $data['logo'] = date('dmYHis') . "-logo";
        $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();

        $alamat = $this->mod_alamat->alamat()->result();

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
            $data['username'] = $a->username;
            $data['password'] = $a->password;

            if ($a->logo != "") {
                $logo = "upload/" . $a->logo;
                if (file_exists($logo)) {
                    $data['logo'] = $a->logo;
                    $data['nama_file'] = $a->logo;
                    $data['file_logo'] = base_url() . "upload/" . $a->logo . "?" . rand();
                } else {
                    $data['logo'] = "";
                    $data['nama_file'] = "logo";
                    $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['logo'] = "";
                $data['nama_file'] = "logo";
                $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/alamat', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses()
    {
        $telp = $this->input->post('telp');
        $fax = $this->input->post('fax');
        $wa = $this->input->post('wa');
        $email = $this->input->post('alamat_email');
        $web = $this->input->post('url_web');
        $lokasi = $this->input->post('lokasi_kantor');
        $kecamatan = $this->input->post('kecamatan');
        $propinsi = $this->input->post('propinsi');
        $link_googlemap = $this->input->post('link_googlemap');
        $link_facebook = $this->input->post('link_facebook');
        $link_ig = $this->input->post('link_ig');
        $link_twitter = $this->input->post('link_twitter');
        $link_youtube = $this->input->post('link_youtube');
        $logo = $this->input->post('file_target');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            "telp" => $telp,
            "fax" => $fax,
            "wa" => $wa,
            "email" => $email,
            "web" => $web,
            "lokasi" => $lokasi,
            "kecamatan" => $kecamatan,
            "propinsi" => $propinsi,
            "link_googlemap" => $link_googlemap,
            "link_facebook" => $link_facebook,
            "link_ig" => $link_ig,
            "link_twitter" => $link_twitter,
            "link_youtube" => $link_youtube,
            "logo" => $logo,
            "username" => $username,
            "password" => $password
        );

        $this->mod_alamat->hapus();
        $this->mod_alamat->simpan($data);

        $pesan = 1;
        $isipesan = "Alamat kontent di-update";

        redirect("alamat/index/$pesan/$isipesan");
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
