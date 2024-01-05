<?php
$aksi = "modul/mod_pembelian/aksi_pembelian.php";

$query = mysqli_query($conn, "SELECT * FROM pemesanan p
                        JOIN nama_produk np ON np.id_nama_produk = p.id_nama_produk
                        JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori
                        WHERE p.id_nama_produk = '$_GET[id]'
                        ORDER BY tgl_pembelian DESC");
$hasil = mysqli_num_rows($query);

$query_jm = mysqli_query($conn, "SELECT * FROM nama_produk np JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori WHERE id_nama_produk = '$_GET[id]'");
$data_jm = mysqli_fetch_array($query_jm);
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
            <h2><i class="icon-user"></i> Detail Antrian : <?php echo $data_jm['kategori'].' '.$data_jm['nama_produk'];?></h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 5%;">
                            No.
                        </th>
                        <th style="width: 15%;">
                            Tanggal Pesan
                        </th>
                        <th style="width: 10%;">
                            Tanggal Selesai
                        </th>
                        <th style="width: 10%;">
                            Quantity
                        </th>
                        <th style="width: 10%;">
                            Pemesan
                        </th>
                        <th style="width: 15%;">
                            Keterangan
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
                            <td><?php echo $data['tanggal_terima_brg']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td><?php echo $data['buyer']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
