<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentangkami extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_tentangkami');
    }

    public function index($pesan = "", $isipesan = "")
    {
        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //reset kontent
        $data['uraian'] = "";

        $tentangkami = $this->mod_tentangkami->tentangkami()->result();

        foreach ($tentangkami as $tk) {
            $data['uraian'] = $tk->uraian;
        }

        $data['halaman'] = "tentang";

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/tentangkami', $data);
        $this->load->view('body/cms/bodybawah2', $data);
    }

    public function proses()
    {
        $uraian = $this->input->post('uraian');

        $data = array(
            "uraian" => $uraian
        );

        $this->mod_tentangkami->hapus();
        $this->mod_tentangkami->simpan($data);

        $pesan = 1;
        $isipesan = "Uraian kontent tentang kami di-update";

        redirect("tentangkami/index/$pesan/$isipesan");
    }
}
