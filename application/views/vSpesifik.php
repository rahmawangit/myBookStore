<html>
<div class="container">
    INI DAFTAR BUKU
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Penerbit</th>
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
                <td><?= $row['tahun_terbit']; ?></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

</html>