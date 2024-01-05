<?php
$aksi = "modul/mod_kategori/aksi_kategori.php";

$id_merk = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tbl_kategori
                               WHERE id_kategori = $id_merk")or die(mysql_error($conn));
$hasil = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=kategori">Kategori</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Ubah Kategori</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal"   method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=kategori&act=ubah">
                <input type="hidden" value="<?php echo $data['id_kategori']; ?>" name="id_kategori" id="id"/>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input type="text" name="kategori" class="form-field" value="<?php echo $data['kategori']; ?>">
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
