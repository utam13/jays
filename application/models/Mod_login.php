<?
class mod_login extends CI_Model
{
    public function cek_user($username, $password)
    {
        return $this->db->query("select * from alamat where username='$username' and password='$password'")->num_rows();
    }

    public function resetpass($username, $password)
    {
        $this->db->query("update alamat set username='$username',password='$password' where kdalamat<>'0'");
    }
}
