<?php include 'koneksi.php'; ?>
<h2>Tambah Data Warga</h2>
<form method="post">
    Nama Lengkap: <input type="text" name="nama_lengkap"><br>
    Nomor KK: <input type="text" name="nomor_kk"><br>
    NIK: <input type="text" name="nik"><br>
    Alamat: <input type="text" name="alamat"><br>
    Status: 
    <select name="status">
        <option value="Kepala Keluarga">Kepala Keluarga</option>
        <option value="Anggota Keluarga">Anggota Keluarga</option>
    </select><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    // Menghindari SQL Injection dengan real_escape_string
    $nama = $conn->real_escape_string($_POST['nama_lengkap']);
    $kk = $conn->real_escape_string($_POST['nomor_kk']);
    $nik = $conn->real_escape_string($_POST['nik']);
    $alamat = $conn->real_escape_string($_POST['alamat']);
    $status = $conn->real_escape_string($_POST['status']);

    $sql = "INSERT INTO warga (nama_lengkap, nomor_kk, nik, alamat, status)
            VALUES ('$nama', '$kk', '$nik', '$alamat', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Data berhasil ditambahkan. <a href='index.php'>Kembali</a>";
    } else {
        echo "❌ Gagal menyimpan data: " . $conn->error;
    }
}
?>
