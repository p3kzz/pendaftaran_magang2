<?php
require '../koneksi.php';

$userId = $_SESSION['users']['id'];
$sqlData = "SELECT 
    l.nilai_laporan,
    l.laporan_id,
    l.mahasiswa_id, 
    l.penguji_id, 
    up.judul_laporan AS judul_laporan,
    up.file_laporan AS file_laporan,
    m.nama AS nama_mahasiswa, 
    m.nama AS nama_mahasiswa, 
    m.nama AS nama_mahasiswa, 
    m.nim AS nim_mahasiswa, 
    m.angkatan AS angkatan_mahasiswa, 
    u1.name AS nama_penguji, 
    pb.nip AS nip_penguji
FROM penilaian l
LEFT JOIN upload_laporan up ON l.laporan_id = up.id 
LEFT JOIN mahasiswa m ON l.mahasiswa_id = m.id 
LEFT JOIN penguji pb ON l.penguji_id = pb.id
LEFT JOIN users u1 ON pb.penguji_id = u1.id
WHERE u1.id = ?";

$queryDataL = $conn->prepare($sqlData);
$queryDataL->bind_param("i", $userId);
$queryDataL->execute();
$result = $queryDataL->get_result();

?>

<section class="content-header">
    <h1>Laporan yang Sudah Dinilai</h1>
    <ol class="breadcrumb">
        <li><a href="index.php?dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?data_laporan_magang">Data Laporan</a></li>
        <li class="active">Laporan yang Sudah Dinilai</li>
    </ol>
</section>

<section class="content">
    <div class="box box-info">
        <div class="box-header">
            <h3>Laporan yang Sudah Dinilai oleh Anda</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Angkatan</th>
                        <th>Judul Laporan</th>
                        <th>File Laporan</th>
                        <th>Nilai Laporan</th>
                        <th>Nama Penguji</th>
                        <th>NIP Penguji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($laporan = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . htmlspecialchars($laporan['nama_mahasiswa']) . "</td>
                                <td>" . htmlspecialchars($laporan['nim_mahasiswa']) . "</td>
                                <td>" . htmlspecialchars($laporan['angkatan_mahasiswa']) . "</td>
                                <td>" . htmlspecialchars($laporan['judul_laporan']) . "</td>
                                <td>";
                                    if (!empty($laporan['file_laporan'])) {
                                        echo "<a href='../dist/file/" . htmlspecialchars($laporan['file_laporan']) . "' target='_blank'>Lihat Laporan</a>";
                                    } else {
                                        echo "<span class='text-danger'>Tidak ada file</span>";
                                    }
                                echo "</td>
                                <td>" . htmlspecialchars($laporan['nilai_laporan']) . "</td>
                                <td>" . htmlspecialchars($laporan['nama_penguji']) . "</td>
                                <td>" . htmlspecialchars($laporan['nip_penguji']) . "</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>Tidak ada laporan yang sudah dinilai.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>