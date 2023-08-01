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
<form action="<?= base_url('cBase/editBuku/').$data_buku['kode_buku'];?>" method="POST">

    <div class="mb-3">
        <label for="x" class="form-label">Kode Buku</label>
        <input type="text" class="form-control" id="x" name="x" value="<?= $data_buku['kode_buku'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="editNama" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="editNama" name="editNama" value="<?= $data_buku['judul_buku'] ?>">
    </div>
    <!-- <div class="mb-3">
        <label for="editTerbit" class="form-label">Tahun Terbit</label>
        <input type="text" class="form-control" id="editTerbit" name="editTerbit"
            value="<?= $data_buku['tahun_terbit'] ?>">
    </div>
    <div class="mb-3">
        <label for="editPenerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="editPenerbit" name="editPenerbit"
            value="<?= $data_buku['nama_penerbit'] ?>">
    </div> -->
    <?php
    $penerbit = $data_buku['kode_penerbit'];
        ?>
    <div class="form-floating">
        <select class="form-control" id="floatingPenerbit" name="editTerbit">
            <?php for($a=2021;$a<=2023;$a++) {
                        if($a == $data_buku['tahun_terbit']){ ?>
            <option value="<?=$a;?>" selected><?=$a;?> </option>
            <?php        
                }else{?>
            <option value="<?=$a;?>"><?=$a;?> </option>
            <?php } }?>
        </select>
        <label for="floatingPenerbit" class="form-label">Tahun Terbit</label>
    </div>
    <div class="form-floating">
        <select class="form-control" id="floatingYear" name="editPenerbit">
            <?php 
            // $x =0;
            
                foreach($data_penerbit as $row) { 
                    if($row['kode_penerbit'] == $penerbit){
                        ?>
            <option value="<?=$row['kode_penerbit'];?>" selected>
                <!-- VIEW OPTION -->
                <?=$row['nama_penerbit'];?>
            </option>
            <?php
                    }else{
                        ?>
            <option value="<?=$row['kode_penerbit'];?>">
                <!-- VIEW OPTION -->
                <?=$row['nama_penerbit'];?>
            </option>
            <?php } ?>
            <!-- VALUE ISI NANTI DI LEMPAR -->
            <?php 
            // $x++;
        } ?>
        </select>
        <label for="floatingYear" class="form-label">Penerbit</label>
    </div>

    <button type="submit" class="btn btn-primary" onclick="history.back()">Kembali</button>
    <button type="submit" class="btn btn-primary">Update</button>
</form>