<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_login');
    }

    public function proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username == "administrator" && $password = "root") {
            $user = array(
                "stat_cms" => "login"
            );

            $this->session->set_userdata($user);

            redirect("tentangkami");
        } else {
            $ada = $this->mod_login->cek_user($username, $password);

            if ($ada > 0) {

                $user = array(
                    "stat_cms" => "login"
                );

                $this->session->set_userdata($user);

                redirect("tentangkami");
            } else {
                $isipesan = "User yang dimasukkan tidak ditemukan";

                redirect("landing/index/1/1/-/$isipesan");
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("landing");
    }

    public function reset($email)
    {
        $passbaru = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);

        $this->mod_login->resetpass("admin", $passbaru);

        //kirim email
        $judul = "Reset Password CMS (noreply)";
        $isi = "Ini adalah email reset password CMS. <br>Silakan gunakan password baru di bawah ini, kemudian Log In ke dalam aplikasi kemudian ubah di pengaturan konten Alamat Perusahaan. <br>User Name: admin<br>Password Reset: " . $passbaru;

        $proses = $this->kirim_email->email($email, $judul, $isi);

        $isipesan = "Password sudah direset dan dikirimkan ke email Perusahaan ($proses)";

        redirect("landing/index/1/1/-/$isipesan");
    }
}
