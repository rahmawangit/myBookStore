<?php
    // echo "awal";
    // var_dump($data_buku);
    // $row = $data_buku;
    // echo "<br>";
    // echo "<br>";

    // echo "row";
    // var_dump($row);
    // echo "<br>";
    // echo "<br>";

    // echo "each";
    // foreach($data_buku as $boko){
    //     echo $boko['judul_buku'];
    // }
?>
 <?= $this->session->flashdata('pesan'); ?>
<form action="<?= base_url('cBase/editPenerbit/').$data_penerbit['kode_penerbit'];?>" method="POST">

    <div class="mb-3">
        <label for="x" class="form-label">Kode Penerbit</label>
        <input type="text" class="form-control" id="x" name="x" value="<?= $data_penerbit['kode_penerbit'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="editPenerbit" class="form-label">Nama Penerbit</label>
        <input type="text" class="form-control" id="editPenerbit" name="editPenerbit" value="<?= $data_penerbit['nama_penerbit'] ?>">
    </div>
    <div class="mb-3">
        <label for="editAlamat" class="form-label">Alamat Penerbit</label>
        <input type="text" class="form-control" id="editAlamat" name="editAlamat" value="<?= $data_penerbit['alamat_penerbit'] ?>">
    </div>

    <button type="submit" class="btn btn-primary" onclick="history.back()">Kembali</button>
    <button type="submit" class="btn btn-primary">Update</button>
</form>