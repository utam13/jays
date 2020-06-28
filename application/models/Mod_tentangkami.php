<?
class mod_tentangkami extends CI_Model
{
    public function tentangkami()
    {
        return $this->db->query("select * from tentangkami");
    }

    public function hapus()
    {
        $this->db->query("update tentangkami set uraian='' where kdtentangkami<>'0'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("update tentangkami set uraian='$uraian' where kdtentangkami<>'0'");
    }
}
