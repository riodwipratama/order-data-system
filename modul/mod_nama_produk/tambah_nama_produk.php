<?php
$aksi = "modul/mod_nama_produk/aksi_nama_produk.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=nama_produk">Nama Produk</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Nama Produk Baru</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=nama_produk&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Kategori</label>
                        <div class="controls">
                            <select name="id_kategori" id="id_kategori" class="form-field">
                                <?php
                                $tampil = mysqli_query($conn, "SELECT * FROM tbl_kategori ORDER BY kategori");
                                if ($r['nip'] == 0) {
                                    echo "<option value='' selected>- Pilih Kategori -</option>";
                                }

                                while ($w = mysqli_fetch_array($tampil)) {
                                    echo "<option value=$w[id_kategori]> $w[kategori]</option>";
                                }
                                ?>
                            </select>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Nama Produk</label>
                        <div class="controls">
                            <input type="text" name="nama_produk" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button id="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->
