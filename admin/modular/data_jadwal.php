<?php include '../koneksi.php'; 
?>

<section class="content-header">
    <h1> Data jadwal Sidang</h1>
    <ol class="breadcrumb">
        <li><a href="index.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data jadwal</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-info">
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                    <a href="index.php?add_jadwal" id="btn_create" class='btn btn-success'><span
                            class='glyphicon glyphicon-plus'></span> Tambah </a>
                </div>
                <br /><br /><br />

                <?php
                $sqlJadwal = "SELECT 
                    j.id,
                    j.keterangan, 
                    j.tanggal, 
                    j.tanggal_bimbingan, 
                    m.nama AS nama_mahasiswa,
                    m.nim AS nim_mahasiswa,
                    u1.name AS nama_pembimbing,
                    p.nip AS nip_pembimbing,
                    u2.name AS nama_penguji,
                    g.nip AS nip_penguji
                FROM jadwal j
                LEFT JOIN mahasiswa m ON j.mahasiswa_id = m.id
                LEFT JOIN pembimbing p ON j.pembimbing_id = p.id
                LEFT JOIN users u1 ON p.pembimbing_id = u1.id
                LEFT JOIN penguji g ON j.penguji_id = g.id
                LEFT JOIN users u2 ON g.penguji_id = u2.id
                ORDER BY j.id ASC";

                $resultJadwal = mysqli_query($conn, $sqlJadwal);
                $no_urut = 1;
                ?>

                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Tanggal Bimbingan</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM Mahasiswa</th>
                            <th>Nama Pembimbing</th>
                            <th>NIP Pembimbing</th>
                            <th>Nama Penguji</th>
                            <th>NIP Penguji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($resultJadwal)) { ?>
                        <tr>
                            <td><?php echo $no_urut++; ?>.</td>
                            <td><?php echo $row['keterangan']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
                            <td><?php echo $row['tanggal_bimbingan']; ?></td>
                            <td><?php echo $row['nama_mahasiswa']; ?></td>
                            <td><?php echo $row['nim_mahasiswa']; ?></td>
                            <td><?php echo $row['nama_pembimbing']; ?></td>
                            <td><?php echo $row['nip_pembimbing']; ?></td>
                            <td><?php echo $row['nama_penguji']; ?></td>
                            <td><?php echo $row['nip_penguji']; ?></td>
                            <td>
                                <a href="index.php?edit_data_jadwal&ubah=<?php echo $row['id']; ?>">
                                    <button id="btn_create" class="btn btn-xs btn-primary" data-toggle="tooltip"
                                        title="Ubah"><span class="glyphicon glyphicon-pencil"
                                            aria-hidden="true"></span></button>
                                </a>

                                <a onclick="confirmDelete('<?php echo htmlspecialchars($row['id']); ?>')">
                                    <button id="btn_create" class="btn btn-xs btn-danger" data-toggle="tooltip"
                                        title="Hapus"><span class="glyphicon glyphicon-trash"
                                            aria-hidden="true"></span></button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Arahkan ke hapus
            window.location.href = `index.php?data_jadwal&hapus=${id}`;
        }
    });
}
</script>