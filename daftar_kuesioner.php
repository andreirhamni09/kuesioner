<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kuesioner";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM kuesioner";
$result = $conn->query($sql);


$s_aspek = array(
    'Keberadaan laboratorium membantu pelanggan dalam analisa contoh yang diinginkan',
    'Kebersihan dan kerapihan laboratorium dan fasilitas penunjangnya memadai',
    'Fasilitas laboratorium yang lengkap dan memiliki peralatan yang modern dan mutakhir',
    'Tersedia fasilitas komunikasi : telepon, faksimili, e-mail yang mudah dihubungi',
    'Laboratorium mempunyai kemampuan dan sumberdaya yang memadai dalam proses pelayanan dan pengujian',
    'Kemudahan dalam memproses informasi layanan jasa pengujian cukup memadai',
    'Karyawan merespons permintaan pengujian dengan cepat, tidak birokratis dan diproses segera',
    'Proses pelaksanaan pengujian dilakukan secara tepat waktu sesuai dengan jadwal yang telah ditentukan',
    'Mutu hasil pengujian menyangkut akurasi dan keabsahan hasil cukup memuaskan',
    'Laboratorium memberitahu bila terjadi keterlambatan atau penyimpangan dalam pelaksanaan pengujian'
);
$no = 1;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HASIL KUESIONER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="layout/dist/img/CBI-logo.png">
    <link rel="stylesheet" href="layout/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="layout/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="layout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="layout/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="layout/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="layout/dist/css/jquery.fancybox.min.css">


    <!--download-->
    <link href="layout/dist/css/css.css" rel="stylesheet">

    <!--download-->
    <script type="text/javascript" src="layout/dist/js/loader.js"></script>

    <!--download-->
    <link rel="stylesheet" type="text/css" href="layout/dist/css_tabel/buttons.dataTables.min.css" />
    <!--download-->
    <link rel="stylesheet" type="text/css" href="layout/dist/css/jquery.dataTables.min.css" />


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style type="text/css">
        .center {
            margin: auto;
            height: 500px;
            width: 70%;
            padding: 10px;
            text-align: center;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="hover"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link">Selamat datang!</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link"></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <a href="index" class="brand-link">
                <img src="layout/dist/img/CBI-logo.png" alt="Covid Tracker" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">HASIL KUESIONER</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="content-fluid ">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 pl-2 text-dark">
                                HASIL KUESIONER
                            </h1>
                        </div>
                    </div>

                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title m-0 text-primary">
                                        HASIL KUESIONER
                                    </h1>
                                </div>

                                <div class="card-body table-responsive">
                                    <div style="margin-left: auto; margin-right: auto;">
                                        <table class="table table-bordered table-hover text-center" id="rekapTaksasi">
                                            <?php if ($result->num_rows > 0) : ?>
                                                <?php while ($row = $result->fetch_assoc()):?>
                                                    <?php $ex_nilai = explode('-', $row['nilai']);?>
                                                    <tr>
                                                        <th class="hijau" colspan="2">NAMA</th>
                                                        <th class="hijau" colspan="5">PERUSAHAAN</th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><?=$row['nama_pelanggan'] ?></td>
                                                        <td colspan="5"><?=$row['perusahaan'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="hijau" style="width: 5%;">NO</th>
                                                        <th class="biru" style="width: 70%;">ASPEK YANG DINILAI</th>
                                                        <th class="biru" colspan="4">NILAI</th>
                                                    </tr>
                                                    <!-- UPDATE DATA USER LAB -->
                                                    <?php for ($i = 0; $i < count($s_aspek); $i++) : ?>
                                                        <!-- UPDATE DATA USER LAB -->
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td style="text-align: left;"><?= $s_aspek[$i]; ?></td>
                                                            <td>
                                                                <?= $ex_nilai[$i] ?>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            if($no != 10)
                                                            {
                                                                $no+=1;
                                                            } 
                                                            else{
                                                                $no=1;
                                                            }
                                                        ?>
                                                    <?php endfor; ?>
                                                <?php endwhile;?>
                                            <?php else : ?>
                                                <tr>
                                                    <td>BELOM ADA DATA</td>
                                                </tr>
                                            <?php endif; ?>
                                            
                                            <tr>
                                                <td>Nilai</td>
                                                <td style="text-align:left;" colspan="5">1:Kurang,&emsp;2:Cukup,&emsp;3:Baik,&emsp;4:Amat Baik</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <footer class="main-footer">
            <strong>Copyright © 2014-2019 <a href="http://srs-ssms.com">srs-ssms.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        
    </div>
    <!-- jQuery -->
<script src="layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="layout/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="layout/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="layout/dist/js/demo.js"></script>
<!-- page script -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

<script>

    var nama_user = 'PRIMA WIJAYANTO';

    $('#rekapTaksasi').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: "excelHtml5",
            exportOptions: {
                orthogonal: "exportxls"
            }
        }],
        info: false,
        "columnDefs": [{
                "orderData": 3,
                "targets": 2
            },
            {
                "visible": false,
                "targets": 3
            }
        ]
    });
</script>
</body>
