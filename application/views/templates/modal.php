<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="<?= base_url('cBase/simpanBuku');?>" method="POST">
                    <div class="mb-3">
                        <label for="formJudul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="formJudul" name="judulBuku" >
                    </div>
                    <div class="form-floating">
                        <select class="form-control" id="floatingPenerbit" name="tahunTerbit">
                            <?php for($a=2021;$a<=2023;$a++) { ?>
                                <option value="<?=$a;?>"><?=$a;?></option>
                                <?php } ?>
                            </select>
                        <label for="floatingPenerbit" class="form-label">Tahun Terbit</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-control" id="floatingYear" name="kodePenerbit">
                            <?php foreach($data_penerbit as $row) { ?>
                                <!-- VALUE ISI NANTI DI LEMPAR -->
                                <option value="<?=$row['kode_penerbit'];?>">
                                    <!-- VIEW OPTION -->
                                    <?=$row['nama_penerbit'];?>  
                                </option>
                                <?php } ?>
                            </select>
                        <label for="floatingYear" class="form-label">Tahun Terbit</label>
                    </div>
                    
                
                <!--  -->
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>            
        </div>
    </div>
</div>