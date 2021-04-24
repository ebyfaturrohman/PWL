<?php
class Pegawai{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function dataPegawai(){
        $sql = "SELECT pegawai.*, divisi.nama AS kategori FROM pegawai
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                ORDER BY pegawai.id DESC";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getPegawai($id){
        $sql = "SELECT pegawai.*, divisi.nama AS kategori FROM pegawai
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                ORDER BY pegawai.id DESC";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetch();
        return $rs;
    }
    public function dataDivisi(){
        $sql = "SELECT * FROM divisi";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO pegawai(nip,nama,email,agama,iddivisi,foto)
                VALUES (?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data){
        $sql = "UPDATE pegawai SET nip=?,nama=?,email=?,agama=?,iddivisi=?,foto=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM pegawai WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}
