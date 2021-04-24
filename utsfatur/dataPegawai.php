<?php
require_once 'models/Pegawai.php';
$obj = new Pegawai();
$rs = $obj->dataPegawai();
?>
<h3> Data Pegawai </h3>
<a href="index.php?q=formPegawai" class="btn btn-primary">Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">NIP</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Agama</th>
        <th scope="col">Divisi</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
<tbody>
<?php
$no =1;
foreach($rs as $pgw){ 
?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $pgw['nip']; ?></td>
      <td><?= $pgw['nama']; ?></td>
      <td><?= $pgw['email']; ?></td>
      <td><?= $pgw['agama']; ?></td>
      <td><?= $pgw['kategori']; ?></td>
      <td>
      <form>
      <a href="index.php?q=detailPegawai&id=<?= $pgw['id']; ?>"
      class="btn btn-info">Detail</a>
      <a href="index.php?q=formEditPegawai&id=<?= $pgw['id']; ?>"
      class="btn btn-warning">Ubah</a>
      <button name="proses" value="hapus"
        onclick="return confirm('Apakah data akan dihapus ?') "
        class="btn btn-danger">Hapus</button>
        <input type="hidden" name="idx" value="<?= $pgw['id'] ?>" />
      </form>
      </td>
    </tr>
<?php
$no++;
}
?>  
</tbody>
</table>