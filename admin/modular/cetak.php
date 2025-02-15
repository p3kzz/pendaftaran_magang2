<?php include '../../koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universitas Bahaudin mudhary Madura</title>
    <link rel="icon" href="../../dist/img/uniba.png">
    <!-- Theme style -->
    <link rel="shortcut icon" href="../../dist/img/uniba.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../../plugins/pace/pace.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-fileupload/bootstrap-fileupload.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">



    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
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

<section>
    <img src=" ../../dist/img/uniba.png" alt="logo uniba" style="height: 100px; margin-top:20px; margin-left: 45%;">
    <h3 align=" center">UNIVERSITAS BAHAUDIN MUDHARY</h3>
    <h3 align="center"> Laporan peserta magang</h3>
</section>

<!-- Main content -->
<section class="content">
    <!-- quick email widget -->
    <div class="box box-info">
        <div class="box-header">
            <div class="row-fluid" style="overflow:auto">

                <?php
                $sql =  "SELECT * FROM mahasiswa inner join magang on mahasiswa.id = magang.mahasiswa_id";
                $result = mysqli_query($conn,  $sql);
                $no_urut = 1;
                ?>

                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama mahasiswa</th>
                            <th>NIM </th>
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