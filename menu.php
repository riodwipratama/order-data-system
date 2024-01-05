<ul class="nav nav-tabs nav-stacked main-menu">
    <?php if ($_SESSION['hak_akses'] == 'admin') { ?>
        <a class="brand" href="index.php?modul=home"> <img src="img/schedule.png" /></a>
        <li class="nav-header hidden-tablet"> Schedule CV. Kampoeng Radjoet</li>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Data Master</li>
        <li><a class="ajax-link" href="index.php?modul=petugas"><i class="icon-user"></i><span class="hidden-tablet"> Hak Akses</span></a></li>
        <li><a class="ajax-link" href="index.php?modul=antrian"><i class="icon-list"></i><span class="hidden-tablet"> Antrian Pemesanan</span></a></li>
        <li class="nav-header hidden-tablet">Laporan</li>
        <li><a class="ajax-link" href="modul/mod_antrian/cetak_antrian.php"><i class="icon-list"></i><span class="hidden-tablet"> Laporan Antrian Pesanan</span></a></li>
        <!-- <li><a class="ajax-link" href="index.php?modul=laporan_pembelian"><i class="icon-calendar"></i><span class="hidden-tablet"> Laporan Pemesanan</span></a></li> -->
        <!-- <li><a class="ajax-link" href="index.php?modul=laporan_penjualan"><i class="icon-calendar"></i><span class="hidden-tablet"> Laporan Selesai Produksi</span></a></li> -->
    <?php } else { ?>
        <a class="brand" href="index.php?modul=home"> <img src="img/schedule.png" /></a>
        <li class="nav-header hidden-tablet"> Schedule CV. Kampoeng Radjoet</li>
        <li class="nav-header hidden-tablet">Menu Utama</li>
        <li><a class="ajax-link" href="index.php?modul=home"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
        <li class="nav-header hidden-tablet">Data Master</li>
        <li><a class="ajax-link" href="index.php?modul=kategori"><i class="icon-tag"></i><span class="hidden-tablet"> Kategori Produk</span></a></li>
        <li><a class="ajax-link" href="index.php?modul=nama_produk"><i class="icon-tag"></i><span class="hidden-tablet"> Nama Produk</span></a></li>
        <li><a class="ajax-link" href="index.php?modul=antrian"><i class="icon-list"></i><span class="hidden-tablet"> Antrian Pemesanan</span></a></li>
        <li class="nav-header hidden-tablet">Transaksi</li>
        <li><a class="ajax-link" href="index.php?modul=pembelian"><i class="icon-list"></i><span class="hidden-tablet"> Pemesanan Barang </span></a></li>
        <li><a class="ajax-link" href="index.php?modul=penjualan"><i class="icon-list"></i><span class="hidden-tablet"> Penerimaan Barang</span></a></li>
        <li class="nav-header hidden-tablet">Laporan</li>
        <li><a class="ajax-link" href="modul/mod_antrian/cetak_antrian.php"><i class="icon-list"></i><span class="hidden-tablet"> Laporan Antrian Pesanan</span></a></li>
        <!-- <li><a class="ajax-link" href="index.php?modul=laporan_pembelian"><i class="icon-calendar"></i><span class="hidden-tablet"> Laporan Pemesanan</span></a></li>-->
        <!-- <li><a class="ajax-link" href="index.php?modul=laporan_penjualan"><i class="icon-calendar"></i><span class="hidden-tablet"> Laporan Selesai Produksi</span></a></li> -->
    <?php } ?>
</ul>
