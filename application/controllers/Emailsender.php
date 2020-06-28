<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emailsender extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_emailsender');
    }

    public function index($pesan = "", $isipesan = "")
    {
        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //reset kontent
        $data['host'] = "";
        $data['email'] = "";
        $data['password'] = "";
        $data['port'] = "";
        $data['aktif_ssl'] = "";

        $emailsender = $this->mod_emailsender->emailsender()->result();

        foreach ($emailsender as $es) {
            $data['host'] = $es->host;
            $data['email'] = $es->email;
            $data['password'] = $es->password;
            $data['port'] = $es->port;
            if ($es->ssl == 1) {
                $data['aktif_ssl'] = "checked";
            } else {
                $data['aktif_ssl'] = "";
            }
        }

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/emailsender', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses()
    {
        $host = $this->input->post('host');
        $email = $this->input->post('alamat_email');
        $password = $this->input->post('password');
        $port = $this->input->post('port');
        $ssl = $this->input->post('ssl', true) == null ? 0 : 1;

        $data = array(
            "host" => $host,
            "email" => $email,
            "password" => $password,
            "port" => $port,
            "ssl" => $ssl
        );

        $this->mod_emailsender->hapus();
        $this->mod_emailsender->simpan($data);

        $pesan = 1;
        $isipesan = "Pengaturan Email Sender di-update";

        redirect("emailsender/index/$pesan/$isipesan");
    }

    public function teskirim()
    {
        $email_target = $this->input->post('email_testing');
        $judul = "Tes pengiriman email (noreply)";
        $isi = "Ini adalah email tes dari server untuk keperluan alert aplikasi.";

        $proses = $this->kirim_email->email($email_target, $judul, $isi);

        $pesan = 2;
        $isipesan = "Hasil tes $proses ke $email_target ";

        redirect("emailsender/index/$pesan/$isipesan");
    }
}
