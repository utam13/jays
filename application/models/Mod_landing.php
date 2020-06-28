<?
class mod_landing extends CI_Model
{
    public function headslide()
    {
        return $this->db->query("select * from headslider");
    }

    public function tentangkami()
    {
        return $this->db->query("select * from tentangkami");
    }

    public function slide()
    {
        return $this->db->query("select * from bidangpekerjaan order by nama_bidang ASC");
    }

    public function galeri($start = 0, $end = 6, $q_cari)
    {
        return $this->db->query("select a.gambar,b.nama_pekerjaan,b.pelanggan 
                                    from galeri a
                                        inner join pekerjaan b
                                            on a.kdpekerjaan=b.kdpekerjaan
                                    where $q_cari limit $start, $end
                                ");
    }

    public function galeri2()
    {
        return $this->db->query("select a.gambar
                                    from galeri a
                                        inner join pekerjaan b
                                            on a.kdpekerjaan=b.kdpekerjaan
                                ");
    }

    public function jumlah_data_galeri($q_cari)
    {
        return $this->db->query("select a.gambar,b.nama_pekerjaan,b.pelanggan 
                                    from galeri a
                                        inner join pekerjaan b
                                            on a.kdpekerjaan=b.kdpekerjaan
                                where $q_cari ")->num_rows();
    }

    public function pekerjaan($start = 0, $end = 3)
    {
        return $this->db->query("select * from pekerjaan order by tgl_selesai DESC limit $start, $end");
    }

    public function jumlah_data_pekerjaan()
    {
        return $this->db->query("select * from pekerjaan")->num_rows();
    }

    public function ada_pekerjaan($kode)
    {
        return $this->db->query("select * from pekerjaan where kdbidkerja='$kode'")->num_rows();
    }

    public function ada_galeri($kode)
    {
        return $this->db->query("select a.* from galeri a inner join pekerjaan b on a.kdpekerjaan=b.kdpekerjaan where b.kdbidkerja='$kode'")->num_rows();
    }

    public function ada_galeri_pekerjaan($kode)
    {
        return $this->db->query("select * from galeri where kdpekerjaan='$kode'")->num_rows();
    }

    public function gambar_utama($kode)
    {
        return $this->db->query("select gambar from galeri where kdpekerjaan='$kode' and utama='1'");
    }

    public function jmlkomen($kode)
    {
        return $this->db->query("select * from komentar where kdpekerjaan='$kode'")->num_rows();
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
