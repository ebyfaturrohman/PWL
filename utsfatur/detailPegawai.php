<?php
require_once 'models/Pegawai.php';
$id = $_REQUEST['id'];
$obj = new Pegawai();
$rs = $obj->getPegawai($id);
//print_r($rs); exit();
?>
<div class="card" style="width: 18rem;">
    <?php
    $gambar = (!empty($rs['foto'])) ? $rs['foto'] : "no_image.png";
    ?>
    <img src="images/<?= $gambar ?>" width="40%" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title"><?= $rs['nama'] ?></h5>
        <p class="card-text">
            NIP : <?= $rs['nip'] ?>
            <br/>Email : <?= $rs['email'] ?>
            <br/>Agama : <?= $rs['agama'] ?>
            <br/>Divisi : <?= $rs['kategori'] ?>
        </p>
        <a href="index.php?q=dataPegawai" class="btn btn-primary">Back</a>
    </div>
</div>