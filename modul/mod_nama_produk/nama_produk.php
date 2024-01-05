<?php
$aksi = "modul/mod_nama_produk/aksi_nama_produk.php";

$query = mysqli_query($conn, "select * from nama_produk nm JOIN tbl_kategori tk ON tk.id_kategori = nm.id_kategori");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=nama_produk">Nama Produk</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Kategori - Nama Produk</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_nama_produk"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
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
                        <th style="width: 25%;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td>
                                <a href="index.php?modul=ubah_nama_produk&&id=<?php echo $data['id_nama_produk']; ?>" class="btn btn-info" ><i class="icon-edit icon-white"></i>Ubah</a>
                                <a href="<?php echo $aksi . '?modul=nama_produk&&act=hapus&&id=' . $data['id_nama_produk']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
