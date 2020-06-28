<?
class mod_emailsender extends CI_Model
{
    public function emailsender()
    {
        return $this->db->query("select * from emailsender");
    }

    public function hapus()
    {
        $this->db->query("truncate table emailsender");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into emailsender values('','$host','$email','$password','$port','$ssl')");
    }
}
