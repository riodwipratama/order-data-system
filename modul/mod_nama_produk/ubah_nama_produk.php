<?php
$aksi = "modul/mod_nama_produk/aksi_nama_produk.php";

$id_nama_produk = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM nama_produk
                               WHERE id_nama_produk = $id_nama_produk")or die(mysqli_error($conn));
$hasil = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=nama_produk">Kategori</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Ubah Nama Produk</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal"   method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=nama_produk&act=ubah">
                <input type="hidden" value="<?php echo $data['id_nama_produk']; ?>" name="id_nama_produk" id="id"/>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Kategori</label>
                        <div class="controls">
                            <select name="id_kategori" id="id_kategori" class="form-field">
                                <?php
                                $tampil = mysqli_query($conn, "SELECT * FROM tbl_kategori ORDER BY kategori");
                                if ($data['id_kategori'] == 0) {
                                    echo "<option value='' selected>- Pilih Kategori -</option>";
                                }
                                echo "<option value='' selected>- Pilih Kategori -</option>";

                                while ($w = mysqli_fetch_array($tampil)) {
                                    echo "<option value=$w[id_kategori]> $w[kategori]</option>";
                                }
                                ?>
                            </select>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama Produk</label>
                        <div class="controls">
                            <input type="text" name="nama_produk" value="<?php echo $data['nama_produk'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
