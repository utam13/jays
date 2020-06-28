<?
class mod_blog extends CI_Model
{
    public function bidang($kode)
    {
        return $this->db->query("select * from bidangpekerjaan where kdbidkerja='$kode'");
    }

    public function pekerjaan($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from pekerjaan where $q_cari order by tgl_selesai DESC limit $start, $end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from pekerjaan where $q_cari")->num_rows();
    }

    public function jmlkomen($kode)
    {
        return $this->db->query("select * from komentar where kdpekerjaan='$kode'")->num_rows();
    }

    public function gambar_utama($kode)
    {
        return $this->db->query("select gambar from galeri where kdpekerjaan='$kode' and utama='1'");
    }

    public function posting($start = 0, $end = 10)
    {
        return $this->db->query("select * from pekerjaan order by tgl_selesai DESC limit $start, $end");
    }

    public function daftar_bidang()
    {
        return $this->db->query("select kdbidkerja,nama_bidang from bidangpekerjaan");
    }

    public function tags()
    {
        return $this->db->query("select nama_tags from tags");
    }

    public function galeri()
    {
        return $this->db->query("select a.gambar
                                    from galeri a
                                        inner join pekerjaan b
                                            on a.kdpekerjaan=b.kdpekerjaan");
    }

    public function galeri_perkerjaan($kode)
    {
        return $this->db->query("select gambar from galeri where kdpekerjaan='$kode'");
    }

    public function alamat()
    {
        return $this->db->query("select * from alamat");
    }

    public function detail_pekerjaan($kode)
    {
        return $this->db->query("select a.*,b.nama_bidang from pekerjaan a inner join bidangpekerjaan b on a.kdbidkerja=b.kdbidkerja where a.kdpekerjaan='$kode'");
    }

    public function komentar_utama($start = 0, $end = 10, $kode)
    {
        return $this->db->query("select * from komentar where kdpekerjaan='$kode' and kdkomenbalasan='0' order by tglkomen DESC limit $start, $end");
    }

    public function komentar_balasan($kode)
    {
        return $this->db->query("select * from komentar where kdkomenbalasan='$kode' and kdkomenbalasan<>'0' order by tglkomen DESC");
    }

    public function jumlah_komentar_utama($kode)
    {
        return $this->db->query("select * from komentar where kdpekerjaan='$kode' ")->num_rows();
    }

    public function simpankomen($data)
    {
        extract($data);
        $this->db->query("insert into komentar values('','$kdpekerjaan','$tglkomen','$nama','$email','$perusahaan','$komentar','$kdkomenbalasan')");
    }
}
