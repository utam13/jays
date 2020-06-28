<?
class mod_komentar extends CI_Model
{
    public function komentar($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from komentar where $q_cari order by tglkomen DESC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from komentar where $q_cari ")->num_rows();
    }

    public function pekerjaan($kode)
    {
        return $this->db->query("select * from pekerjaan where kdpekerjaan='$kode' ");
    }

    public function ambil_komentar($kode)
    {
        return $this->db->query("select a.*,b.kdbidkerja from komentar a inner join pekerjaan b on a.kdpekerjaan=b.kdpekerjaan where a.kdkomen='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into komentar values('','$kdpekerjaan','$tglkomen','$nama','$email','$perusahaan','$komentar','$kdkomenbalasan')");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from komentar where kdkomen='$kode'");
    }

    public function hapusbalasan($kode)
    {
        $this->db->query("delete from komentar where kdkomenbalasan='$kode'");
    }
}
