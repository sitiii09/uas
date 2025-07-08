<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM warga WHERE id=$id")->fetch_assoc();
?>
<h2>Edit Data</h2>
<form method="post">
    Nama: <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>"><br>
    KK: <input type="text" name="nomor_kk" value="<?= $data['nomor_kk'] ?>"><br>
    NIK: <input type="text" name="nik" value="<?= $data['nik'] ?>"><br>
    Alamat: <input type="text" name="alamat" value="<?= $data['alamat'] ?>"><br>
    Status:
    <select name="status">
        <option value="Kepala Keluarga" <?= $data['status']=='Kepala Keluarga'?'selected':'' ?>>Kepala Keluarga</option>
        <option value="Anggota Keluarga" <?= $data['status']=='Anggota Keluarga'?'selected':'' ?>>Anggota Keluarga</option>
    </select><br>
    <button name="update">Simpan Perubahan</button>
</form>

<?php
if (isset($_POST['update'])) {
    $koneksi->query("UPDATE warga SET 
        nama_lengkap='$_POST[nama_lengkap]',
        nomor_kk='$_POST[nomor_kk]',
        nik='$_POST[nik]',
        alamat='$_POST[alamat]',
        status='$_POST[status]'
        WHERE id=$id
    ");
    echo "Data berhasil diubah. <a href='index.php'>Kembali</a>";
}
?>