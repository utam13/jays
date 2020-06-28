<?
class mod_quotes extends CI_Model
{
    public function quotes()
    {
        return $this->db->query("select * from quotes");
    }

    public function hapus()
    {
        $this->db->query("update quotes set quotes1='',oleh1='',quotes2='',oleh2='',quotes3='',oleh3='' where kdquotes<>'0'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("update quotes set quotes1='$quotes1',oleh1='$oleh1',quotes2='$quotes2',oleh2='$oleh2',quotes3='$quotes3',oleh3='$oleh3' where kdquotes<>'0'");
    }
}
