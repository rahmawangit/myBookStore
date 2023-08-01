<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Penerbit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- FORM -->
                <form action="<?= base_url('cBase/simpanPenerbit');?>" method="POST">
                    <div class="mb-3">
                        <label for="formPenerbit" class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" id="formPenerbit" name="namaPenerbit" >
                    </div>
                    <div class="mb-3">
                        <label for="formAlamat" class="form-label">Alamat Penerbit</label>
                        <input type="text" class="form-control" id="formAlamat" name="alamatPenerbit" >
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