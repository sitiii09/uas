<?php include 'koneksi.php'; ?>

<h2>Data Warga</h2>
<a href="tambah.php">+ Tambah Data</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr style="background-color: #f2f2f2;">
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Nomor KK</th>
        <th>NIK</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $sql = "SELECT * FROM warga";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama_lengkap']}</td>
                    <td>{$row['nomor_kk']}</td>
                    <td>{$row['nik']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> | 
                        <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='7'>Data belum tersedia.</td></tr>";
    }
    ?>
</table>
