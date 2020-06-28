<?
class mod_galeri extends CI_Model
{
    public function galeri($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from galeri where $q_cari limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from galeri where $q_cari ")->num_rows();
    }

    public function pekerjaan($kode)
    {
        return $this->db->query("select * from pekerjaan where kdpekerjaan='$kode' ");
    }

    public function ambil_galeri($kode)
    {
        return $this->db->query("select * from galeri where kdgaleri='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into galeri values('','$kdpekerjaan','$gambar','$utama')");
    }

    public function bersihkan_utama($kode)
    {
        $this->db->query("update galeri set utama='0' where kdpekerjaan='$kode'");
    }

    public function utama($kode)
    {
        $this->db->query("update galeri set utama='1' where kdgaleri='$kode'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from galeri where kdgaleri='$kode'");
    }
}
