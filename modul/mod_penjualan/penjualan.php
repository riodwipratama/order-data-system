<?php
$aksi = "modul/mod_penjualan/aksi_penjualan.php";

$query = mysqli_query($conn, "SELECT tb.id_pemesanan, tb.keterangan, id_terima_barang, kategori, nama_produk, buyer, tgl_penjualan, quantity
                                        FROM terima_barang tb
					JOIN pemesanan p ON p.id_pemesanan = tb.id_pemesanan
					JOIN nama_produk np ON np.id_nama_produk = p.id_nama_produk
					JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori
					ORDER BY tgl_pembelian DESC");
          /*
          pj(penjualan)=tb(terima barang) ----- id_pembelian = id_pemesanan ----- id_penjualan = id_terima_barang ----- nama_merk = kategori ----
          jenis_motor = nama_produk ------ nopol = tanggal_terima_barang ----- pembeli = pembeli -----
          */
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=penjualan">Schedule Penerimaan</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Penerimaan </h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?modul=tambah_penjualan"><i class="icon-plus icon-white"></i> Tambah</a>
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
                            Tanggal Selesai
                        </th>
                        <th style="width: 15%;">
                            Kategori - Penjualan
                        </th>
                        <th style="width: 15%;">
                            Buyer
                        </th>

                        <th style="width: 10%;">
                            Quantity
                        </th>
                        <th style="width: 15%;">
                            Ket.
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
                            <td><?php echo format_date($data['tgl_penjualan']); ?></td>
                            <td><?php echo $data['kategori']. ' ' .$data['nama_produk']; ?></td>
                            <td><?php echo $data['buyer']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>

                            <td><?php echo $data['keterangan']; ?></td>
                            <td>
								<a href="modul/mod_penjualan/faktur_penjualan.php<?php echo '?id=' . $data['id_terima_barang']; ?>" class="btn btn-info">Cetak Faktur</a>
                                <a href="<?php echo $aksi . '?modul=penjualan&&act=hapus&&id=' . $data['id_terima_barang']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
