<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("landing"));
        }

        $this->load->model('mod_cmsdashboard');
    }

    public function index()
    {
        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/dashboard');
        $this->load->view('body/cms/bodybawah');
    }
}
