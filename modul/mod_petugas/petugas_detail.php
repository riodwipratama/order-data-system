
<?php
include "../../fungsi/koneksi.php";
include"../../fungsi/fungsi_tanggal.php";
$query = mysql_query("select * from akses
                      WHERE id_petugas=$_GET[id]") or die(mysql_error());
$data = mysql_fetch_array($query);
?>
<!-- MODAL PETUGAS -->
<div class="modal hide fade" id="modal_petugas">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Data Petugas</h3>
    </div>
    <div class="modal-body">
        <table>
            <tr>
                <td>Nama </td>
                <td>: </td>
            </tr>
            <tr>
                <td>Username </td>
                <td>: </td>
            </tr>
            <tr>
                <td>Hak Akses </td>
                <td>: </td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" >Tutup</a>
    </div>
</div>
