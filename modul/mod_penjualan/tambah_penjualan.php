<?php
$aksi = "modul/mod_penjualan/aksi_penjualan.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=penjualan">Penjualan</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Penerimaan Barang</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=penjualan&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Pesanan</label>
                        <div class="controls">
                            <select name="id_pemesanan" id="id_pemesanan" class="form-field">
                                <?php
                                $tampil = mysqli_query($conn, "SELECT * FROM pemesanan p
                                                        JOIN nama_produk np ON np.id_nama_produk = p.id_nama_produk
                                                        JOIN tbl_kategori tk ON tk.id_kategori = np.id_kategori
                                                        WHERE status = 0 ORDER BY kategori");
                                if ($r['nip'] == 0) {
                                    echo "<option value='' selected>- Pilih Pemesan -</option>";
                                }

                                while ($w = mysqli_fetch_array($tampil)) {
                                    echo "<option value=$w[id_pemesanan]> $w[buyer] -- $w[nama_produk] -- $w[quantity]</option>";
                                }
                                ?>
                            </select>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal Selesai</label>
                        <div class="controls">
                            <input type="text" name="tgl_penjualan" value="<?php echo date("d/m/Y");?>"  class="form-field datepicker"">
                                   <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <textarea rows="3" style="width: 210px; height: 100px;" name="keterangan"></textarea>
                            <span></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
<script  type="text/javascript">

</script>
