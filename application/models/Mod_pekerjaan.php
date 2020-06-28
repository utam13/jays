<?
class mod_pekerjaan extends CI_Model
{
    public function pekerjaan($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from pekerjaan where $q_cari order by tgl_selesai ASC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from pekerjaan where $q_cari ")->num_rows();
    }

    public function jmlkomen($kode)
    {
        return $this->db->query("select * from komentar where kdpekerjaan='$kode'")->num_rows();
    }

    public function bidangpekerjaan($kode)
    {
        return $this->db->query("select * from bidangpekerjaan where kdbidkerja='$kode' ");
    }

    public function ambil_pekerjaan($kode)
    {
        return $this->db->query("select * from pekerjaan where kdpekerjaan='$kode'");
    }

    public function ambil_galeri($kode)
    {
        return $this->db->query("select gambar from galeri where kdpekerjaan='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into pekerjaan values('','$kdbidkerja','$nama_pekerjaan','$tgl_mulai','$tgl_selesai','$lokasi','$pelanggan','$uraian')");
    }

    public function cek_tags($nama_tags)
    {
        return $this->db->query("select nama_tags from tags where nama_tags='$nama_tags'")->num_rows();
    }

    public function simpan_tags($nama_tags)
    {
        $this->db->query("insert into tags values('','$nama_tags')");
    }

    public function ubah($data)
    {
        extract($data);
        $this->db->query("update pekerjaan set nama_pekerjaan='$nama_pekerjaan',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',lokasi='$lokasi',pelanggan='$pelanggan',uraian='$uraian' where kdpekerjaan='$kdpekerjaan'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from pekerjaan where kdpekerjaan='$kode'");
    }
}
