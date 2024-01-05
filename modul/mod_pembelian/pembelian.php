<?php
$aksi = "modul/mod_pembelian/aksi_pembelian.php";

$query = mysqli_query($conn, "SELECT * FROM pemesanan p
                        JOIN nama_produk np ON np.id_nama_produk = p.id_nama_produk
                        JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori
                        ORDER BY tgl_pembelian DESC");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=pembelian">Schedule pemesanan</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Pesesanan Barang</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_pembelian"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 5%;">
                            No.
                        </th>
                        <th style="width: 15%;">
                            Tanggal Beli
                        </th>
                        <th style="width: 15%;">
                            Kategori - Produk
                        </th>
                        <th style="width: 10%;">
                            Deadline
                        </th>
                        <th style="width: 10%;">
                            Quantity
                        </th>
                        <th style="width: 10%;">
                            Buyer
                        </th>
                        <th style="width: 15%;">
                            Keterangan
                        </th>
                        <th style="width: 10%;">
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
                            <td><?php echo format_date($data['tgl_pembelian']); ?></td>
                            <td><?php echo $data['kategori'] . ' ' . $data['nama_produk']; ?></td>
                            <td><?php echo $data['tanggal_terima_brg']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td><?php echo $data['buyer']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td>
                                <a href="modul/mod_pembelian/faktur_pembelian.php<?php echo '?id=' . $data['id_pemesanan']; ?>" class="btn btn-info">Cetak Faktur</a>
                                <?php if ($data['status'] == 0) { ?>
                                    <a href="<?php echo $aksi . '?modul=pembelian&&act=hapus&&id=' . $data['id_pemesanan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')">Hapus</a>
                                <?php } else { ?>
                                    <span class="label label-inverse">Selesai</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
