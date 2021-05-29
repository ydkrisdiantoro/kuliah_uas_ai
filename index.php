<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>SPMB</title>
</head>

<body>
    <div class="p-3 text-center">
        <p class="mb-0">Developed by Yayan Dwi Krisdiantoro (4611417077)</p>
    </div>

    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">SPMB 2020</h1>
            <p class="lead mb-0">Website Seleksi Penerimaan Mahasiswa Baru dengan Algoritma ID3</p>
            <small class="lead">Dikembangkan untuk memenuhi UAS Kecerdasan Buatan</small>
        </div>
    </div>

    <?php
    if (isset($_GET['un'], $_GET['toefl'], $_GET['tpa'])) {
    ?>
        <!-- Tampilin proses -->
        <div class="container py-3">

            <h1 class="display-5">Data Terkirim</h1>
            <p class="lead">Setelah melalui proses seleksi, berikut adalah hasilnya.</p>
            <p class="lead"><b>Rekap data yang diinputkan:</b></p>
            <table class="table table-striped">
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?php echo $_GET['nama']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Email</td>
                    <td><?php echo $_GET['surel']; ?></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td><?php echo $_GET['asal']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td><?php echo $_GET['alamat']; ?></td>
                </tr>
                <tr>
                    <td>Nilai UN</td>
                    <td><?php echo $_GET['un']; ?></td>
                </tr>
                <tr>
                    <td>Nilai TOEFL</td>
                    <td><?php echo $_GET['toefl']; ?></td>
                </tr>
                <tr>
                    <td>Nilai TPA</td>
                    <td><?php echo $_GET['tpa']; ?></td>
                </tr>
            </table>

            <!-- RULE DALAM ID3 YANG TELAH DIPEROLEH -->
            <?php

            $tpa = $_GET['tpa'];
            $toefl = $_GET['toefl'];
            $un = $_GET['un'];

            $hasil = '';

            if ($tpa == 'baik') {
                $hasil = 'DITERIMA';
            } elseif ($tpa == 'buruk') {
                if ($toefl == 'kurang') {
                    $hasil = 'TIDAK DITERIMA';
                } elseif ($toefl == 'cukup') {
                    if ($un == 'tinggi') {
                        $hasil = 'DITERIMA';
                    } elseif ($un == 'sedang') {
                        $hasil = 'DITERIMA';
                    } elseif ($un == 'rendah') {
                        $hasil = 'TIDAK DITERIMA';
                    } else {
                        $hasil = 'TIDAK TERDEFINISI';
                    }
                } else {
                    $hasil = 'TIDAK TERDEFINISI';
                }
            } else {
                $hasil = 'TIDAK TERDEFINISI';
            }

            ?>

            <div class="alert
            <?php
            if ($hasil == 'DITERIMA') {
                echo ' alert-success';
            } else {
                echo ' alert-danger';
            }
            ?> ">
                Setelah menimbang hasil nilai saudara, maka diputuskan bahwa saudara<br>
                <h1 class="display-5"><?php echo $hasil; ?></h1>
                Silahkan untuk selanjutnya mengikuti alur yang telah ditentukan.
            </div>

        </div>

    <?php
    } else {
    ?>

        <div class="container py-3">
            <h1 class="display-5">Daftar Sekarang</h1>
            <p class="lead">Silahkan lengkapi form berikut</p>
            <form action="index.php" method="get">
                <div class="row">
                    <div class="col-12">
                        <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                        <input class="form-control mb-3" type="text" name="nama" id="nama" placeholder="Nama Lengkap">
                        <label for="asal">Asal Sekolah <span class="text-danger">*</span></label>
                        <input class="form-control mb-3" type="text" name="asal" id="asal" placeholder="Asal Sekolah">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <input class="form-control mb-3" type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap">
                        <label for="surel">Alamat Email <span class="text-danger">*</span></label>
                        <input class="form-control mb-3" type="text" name="surel" id="surel" placeholder="Alamat Email">
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <p class="lead mb-0"><b>Nilai UN:</b></p>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="un" id="tinggi" value="tinggi">
                                    <label class="custom-control-label" for="tinggi">Tinggi</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="un" id="sedang" value="sedang">
                                    <label class="custom-control-label" for="sedang">Sedang</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="un" id="rendah" value="rendah">
                                    <label class="custom-control-label" for="rendah">Rendah</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <p class="lead mb-0"><b>Nilai TOEFL:</b></p>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="toefl" id="bagus" value="bagus">
                                    <label class="custom-control-label" for="bagus">Bagus</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="toefl" id="cukup" value="cukup">
                                    <label class="custom-control-label" for="cukup">Cukup</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="toefl" id="kurang" value="kurang">
                                    <label class="custom-control-label" for="kurang">Kurang</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <p class="lead mb-0"><b>Nilai TPA:</b></p>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="tpa" id="baik" value="baik">
                                    <label class="custom-control-label" for="baik">Baik</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="tpa" id="buruk" value="buruk">
                                    <label class="custom-control-label" for="buruk">Buruk</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 py-3 text-center">
                        <button type="submit" class="btn btn-primary w-50">Daftar</button>
                    </div>
                </div>
            </form>
        </div>

    <?php
    }
    ?>

    <div class="py-5 text-center">
        <small>Developed by Yayan Dwi Krisdiantoro &copy; 2020/y.d.krisdiantoro@gmail.com</small>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>