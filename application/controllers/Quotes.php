<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_quotes');
    }

    public function index($pesan = "", $isipesan = "")
    {
        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //reset kontent
        $data['quotes1'] = "";
        $data['oleh1'] = "";
        $data['quotes2'] = "";
        $data['oleh2'] = "";
        $data['quotes3'] = "";
        $data['oleh3'] = "";

        $quotes = $this->mod_quotes->quotes()->result();

        foreach ($quotes as $bp) {
            $data['quotes1'] = $bp->quotes1;
            $data['oleh1'] = $bp->oleh1;
            $data['quotes2'] = $bp->quotes2;
            $data['oleh2'] = $bp->oleh2;
            $data['quotes3'] = $bp->quotes3;
            $data['oleh3'] = $bp->oleh3;
        }

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/quotes', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses()
    {
        $quotes1 = $this->clear_string->clear_quotes($this->input->post('quotes1'));
        $oleh1 = $this->clear_string->clear_quotes($this->input->post('oleh1'));
        $quotes2 = $this->clear_string->clear_quotes($this->input->post('quotes2'));
        $oleh2 = $this->clear_string->clear_quotes($this->input->post('oleh2'));
        $quotes3 = $this->clear_string->clear_quotes($this->input->post('quotes3'));
        $oleh3 = $this->clear_string->clear_quotes($this->input->post('oleh3'));

        $data = array(
            "quotes1" => $quotes1,
            "oleh1" => $oleh1,
            "quotes2" => $quotes2,
            "oleh2" => $oleh2,
            "quotes3" => $quotes3,
            "oleh3" => $oleh3
        );

        $this->mod_quotes->hapus();
        $this->mod_quotes->simpan($data);

        $pesan = 1;
        $isipesan = "Quotes kontent di-update";

        redirect("quotes/index/$pesan/$isipesan");
    }
}
