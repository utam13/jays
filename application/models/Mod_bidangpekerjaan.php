<?
class mod_bidangpekerjaan extends CI_Model
{
    public function bidangpekerjaan($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from bidangpekerjaan where $q_cari  order by nama_bidang ASC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from bidangpekerjaan where $q_cari ")->num_rows();
    }

    public function jmlpekerjaan($kode)
    {
        return $this->db->query("select * from pekerjaan where kdbidkerja='$kode'")->num_rows();
    }

    public function cek_nama($nama)
    {
        return $this->db->query("select * from bidangpekerjaan where nama_bidang='$nama' ")->num_rows();
    }

    public function ambil_bidang($kode)
    {
        return $this->db->query("select * from bidangpekerjaan where kdbidkerja='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into bidangpekerjaan values('$kdbidkerja','$nama_bidang','$kalimat_slide','$kalimat_singkat','$font_icon','$gambar_slide')");
    }

    public function ubah($data)
    {
        extract($data);
        $this->db->query("update bidangpekerjaan set nama_bidang='$nama_bidang',kalimat_slide='$kalimat_slide',kalimat_singkat='$kalimat_singkat',font_icon='$font_icon',gambar_slide='$gambar_slide' where kdbidkerja='$kdbidkerja'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from bidangpekerjaan where kdbidkerja='$kode'");
    }
}
