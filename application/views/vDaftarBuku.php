<html>
<div class="container">
    <h2>INI DAFTAR BUKU</h2>
    <!-- FLASH DATA -->
    <?= $this->session->flashdata('pesan'); ?>
    <button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah Buku
    </button>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
                $no = 1;
                foreach($data_buku as $row) { ?>

            <tr>
                <th scope="row"><?= $no++;?> </th>
                <td><?= $row['kode_buku']; ?></td>
                <td><?= $row['judul_buku']; ?></td>
                <td><?= $row['nama_penerbit']; ?></td>
                <!-- ARIEF -->
                <td><a href="<?= base_url('cBase/hapusBuku'); ?>/<?= $row['kode_buku'];?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete?')"> <i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                
                <!-- BAPA -->
                <a href="<?= base_url('cBase/tampilEdit/').$row['kode_buku']; ?>" class="btn btn-info btn-sm"
                       ><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                </td>
                

                <!-- 
                <td><a href="<?= base_url('cBase/hapusBuku/').$row['kode_buku']; ?>" class="btn btn-info btn-sm"
                        onclick="return confirm('Delete?')"> <i class="bi bi-pencil-square " aria-hidden="true"></i></a>
                </td> -->
            </tr>

            

            <?php } ?>
        </tbody>
    </table>
</div>

</html>