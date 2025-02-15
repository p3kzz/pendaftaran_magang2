<?php include '../koneksi.php'; ?>

<script>
function NewWindow(mypage, myname, w, h, scroll) {
    LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
    TopPosition = (screen.height) ? 0 : 0;
    settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' +
        scroll + ',resizable'
    win = window.open(mypage, myname, settings)
    if (win.window.focus) {
        win.window.focus();
    }
}
</script>

<section class="content-header">
    <h1> Cetak Laporan Distribusi </h1>
    <ol class="breadcrumb">
        <li><a href="homepage.php?p=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cetak Laporan Distribusi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">
                <div class="col-md-8">
                    <a onclick="frames['frame'].print();" id="btn_create" class='btn btn-success'><span
                            class='glyphicon glyphicon-print'></span> cetak </a>
                    <iframe src="modular/cetak.php" name="frame" style="display:none"> </iframe><br>
                </div><br /><br /><br />

                <?php
                $sql =  "SELECT * FROM mahasiswa inner join magang on mahasiswa.id = magang.mahasiswa_id";
                $result = mysqli_query($conn,  $sql);
                $no_urut = 1;
                ?>

                <table id=" myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama mahasiswa</th>
                            <th>NIM</th>
                            <th>Tempat Magang</th>
                            <th>Durasi Magang</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $no_urut; ?>.</td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['nim']; ?></td>
                            <td><?php echo $data['lokasi_magang']; ?></td>
                            <td><?php echo $data['tanggal_mulai'] . "-" . $data['tanggal_selesai']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <?php
                            $no_urut++;
                        }
                            ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</section>