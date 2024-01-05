<?php
$aksi = "modul/mod_nama_produk/aksi_nama_produk.php";

$query = mysqli_query($conn, "select * from nama_produk np JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=antrian">Antrian</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Antrian Pemesan</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 10%;">
                            No.
                        </th>
                        <th style="width: 20%;">
                            Kategori
                        </th>
                        <th style="width: 20%;">
                            Nama Produk
                        </th>
                        <th style="width: 20%;">
                            Pemesan
                        </th>
                        <th style="width: 20%;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        $query_stok = mysqli_query($conn, "SELECT * FROM pemesanan p
                            JOIN nama_produk np ON np.id_nama_produk = p.id_nama_produk
                            WHERE p.id_nama_produk = '$data[id_nama_produk]'
                            AND status = 0");
                        $jlh_stok = mysqli_num_rows($query_stok);
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td>
                                <?php echo $jlh_stok; ?> Pemesan
                            </td>
                            <td>
                                <a href="index.php?modul=detail_antrian&id=<?php echo $data['id_nama_produk'];?>" class="btn btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
