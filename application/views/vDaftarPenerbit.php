<?= $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
    Tambah Penerbit
</button>
<div class="card mt-2">

    <div class="card-header text-center">
        <h3 style="margin-bottom: 20px;">Daftar Penerbit</h3>
    </div>
    <table class="table " id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Penerbit</th>
                <th scope="col">Nama Penerbit</th>
                <th scope="col">Alamat Penerbit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                
                $no = 1;
                foreach($data_penerbit as $row) { ?>

            <tr>
                <th scope="row"><?= $no++;?> </th>
                <td><?= $row['kode_penerbit']; ?></td>
                <td><a href="<?= base_url('cBase/kepemilikan/').$row['kode_penerbit']; ?>"><?= $row['nama_penerbit']; ?></a></td>
                <td><?= $row['alamat_penerbit']; ?></td>
                <!-- <td><a href="<?= base_url('cBase/hapusPenerbit/').$row['kode_penerbit']; ?>"
                        class="btn btn-danger btn-sm" onclick="return confirm('Delete?')"> <i class="fa fa-trash fa-4x"
                            aria-hidden="true"></i></a></td> -->
                <td><a href="<?= base_url('cBase/hapusPenerbit'); ?>/<?= $row['kode_penerbit'];?>"
                        class="btn btn-danger btn-sm" onclick="return confirm('Delete?')"> <i class="fa fa-trash fa-2x"
                            aria-hidden="true"></i></a>
                    <a href="<?= base_url('cBase/tampilEditPenerbit/').$row['kode_penerbit']; ?>" class="btn btn-info btn-sm"><i
                            class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>