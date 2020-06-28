<?
class mod_headslider extends CI_Model
{
    public function headslide()
    {
        return $this->db->query("select * from headslider");
    }

    public function hapus1()
    {
        $this->db->query("update headslider set kalimatslide1='',gambarslide1='' where kdhead<>'0'");
    }

    public function hapus2()
    {
        $this->db->query("update headslider set kalimatslide2='',gambarslide2='' where kdhead<>'0'");
    }

    public function hapus3()
    {
        $this->db->query("update headslider set kalimatslide3='',gambarslide3='' where kdhead<>'0'");
    }

    public function simpan1($data)
    {
        extract($data);
        $this->db->query("update headslider set kalimatslide1='$kalimat',gambarslide1='$gambarslide' where kdhead<>'0'");
    }

    public function simpan2($data)
    {
        extract($data);
        $this->db->query("update headslider set kalimatslide2='$kalimat',gambarslide2='$gambarslide' where kdhead<>'0'");
    }

    public function simpan3($data)
    {
        extract($data);
        $this->db->query("update headslider set kalimatslide3='$kalimat',gambarslide3='$gambarslide' where kdhead<>'0'");
    }
}
