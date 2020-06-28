<?
class mod_cmsdashboard extends CI_Model
{
    public function headslide()
    {
        return $this->db->query("select * from headslide");
    }

    public function tentangkami()
    {
        return $this->db->query("select * from tentangkami");
    }

    public function bidangpekerjaan()
    {
        return $this->db->query("select * from bidangpekerjaan");
    }

    public function galeri()
    {
        return $this->db->query("select * from galeri");
    }

    public function alamat()
    {
        return $this->db->query("select * from alamat");
    }

    public function emailsender()
    {
        return $this->db->query("select * from emailsender");
    }
}
