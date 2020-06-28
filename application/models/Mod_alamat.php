<?
class mod_alamat extends CI_Model
{
    public function alamat()
    {
        return $this->db->query("select * from alamat");
    }

    public function hapus()
    {
        $this->db->query("update alamat set telp='',fax='',wa='',email='',web='',lokasi='',kecamatan='',propinsi='',link_googlemap='',link_facebook='',link_ig='',link_twitter='',link_youtube='',logo='',username='',password='' where kdalamat<>'0'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("update alamat set telp='$telp',fax='$fax',wa='$wa',email='$email',web='$web',lokasi='$lokasi',kecamatan='$kecamatan',propinsi='$propinsi',link_googlemap='$link_googlemap',link_facebook='$link_facebook',link_ig='$link_ig',link_twitter='$link_twitter',link_youtube='$link_youtube',logo='$logo',username='$username',password='$password' where kdalamat<>'0'");
    }
}
