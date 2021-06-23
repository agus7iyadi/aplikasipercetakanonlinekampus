<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= base_url('assets/'); ?> cssindex/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?> cssindex/css/scrolling-nav.css" rel="stylesheet">
    <link rel=" stylesheet" type="text/css" href="<?= base_url('assets/'); ?>cssindex/css/animate.css">
    <link rel="<?= base_url('assets/'); ?> stylesheet" href="<?= base_url('assets/'); ?>cssindex/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>cssindex/css/style.css">
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>cssindex/img/icon.png">

    <title>Mager Printing | Males Gerak Printing</title>
</head>

<body>


    <title>Mager Printing</title>
    </head>

    <body>


        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#home">Mager Print</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#Profil">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#Order">Cara order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#harga">Harga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#syarat">Syarat & ketentuan</a>
                        </li>
                    </ul>

                    <!-- tombol kanan -->
                    <ul class="navbar-nav ml-auto navbar-left">
                        <li><a href="<?= base_url('auth/login'); ?>" class="btn btn-info">Masuk </a></li>
                    </ul>
                    <!-- tombol kanan -->
                </div>
            </div>
        </nav>
        <!-- akhir navbar -->

        <!-- jumbotron -->
        <div class="jello animated">
            <div class="jumbotron" id="home">
                <div class="text-center">
                    <img src="<?= base_url('assets/'); ?>cssindex/img/logojumbotron.png">
                    <h1>Mager Printing</h1>
                    <hr>
                    <h5>Website percetakan online terpercaya</h5>
                </div>
            </div>
        </div>
        <br><br>
        <!-- akhir jumbotron-->


        <!-- Profil -->

        <section class="Profil" id="Profil">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 text-center">
                        <br><br><br><br>
                        <h2 class="text-center">Profile</h2>
                        <hr>
                        <p text-center>
                            Rancang bangun aplikasi malas gerak (mager) printing adalah salah satu aplikasi percetakan document pdf/docx berbasis web yang dapat digunakan untuk membantu proses pencetakan dokumen secara online. Selama ini yang awalnya jika kita mencetak suatu dokumen secara manual sekarang kita dapat mengirimkan saja dokumen tersebut melalui web ini , Sehingga penerimaan pesanan serta pengambilan barang lebih cepat, efektif, Rancang bangun aplikasi malas gerak (mager) printing berbasis web di bangun menggunakan bahasa pemograman boostrap, php, html, css, dengan di dukung basis data mysql.</p>
                    </div>
                </div>

        </section>






        <!-- how to order-->
        <section class="Order">
            <div class="container" id="Order">
                <br>
                <div class="container-fluid text-center bg-grey">
                    <h2>Cara order</h2>
                    <hr>
                    <br>
                    <div class="row text-center slideanim">
                        <div class="col-sm-4">
                            <div class="thumbnail">
                                <img src="<?= base_url('assets/'); ?>cssindex/img/GambarProjek1.png" alt="Kamu Upload" width=100%>
                                <br><br>
                                <p>
                                    <p><strong>
                                            <h2>Kamu upload</h2>
                                        </strong></p>
                                </p>
                                <p>Buat akun di Mager Printing, lalu upload dokumen kamu</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="thumbnail">
                                <img src="<?= base_url('assets/'); ?>cssindex/img/GambarProjek2.png" alt="Kami Cetak" width=100%>
                                <br><br>
                                <p>
                                    <p><strong>
                                            <h2>Kami cetak</h2>
                                        </strong></p>
                                </p>
                                <p>Dokumen kamu akan kami proses dan cetak</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="thumbnail">
                                <img src="<?= base_url('assets/'); ?>cssindex/img/GambarProjek3.png" alt="Kamu Terima" width=100%>
                                <br><br>
                                <p>
                                    <p><strong>
                                            <h2>Kamu terima</h2>
                                        </strong></p>
                                </p>
                                <p>Dalam 1 hari kerja, dokumen kamu sampai di tujuan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>

        <!-- label awal -->

        <section class="label" id="dfooter">
            <div class="container " id="harga">
                <div class="row">
                    <div class="col text-center">
                        <br>
                        <h1>Harga</h1>
                        <hr>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div>
                            <div class="card text-white bg-info mb-3 mt-" style="min-width: 6rem; min-height: 25rem; ">

                                <div class="card-header text-center">
                                    <h4>Print Warna</h4>
                                </div>
                                <div class="card-body">

                                    <p class="card-text text-justify">Untuk print warna kertas A4 atau HVS dengan harga Rp.1000 per lembar.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-info mb-3 mt-" style="min-width: 6rem; min-height: 25rem; ">
                            <div class="card-header text-center">
                                <h4>Print Hitam Putih</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-justify">Untuk print hitam putih kertas A4 atau HVS dengan harga Rp.500 per lembar..</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-info mb-3 mt-" style="min-width: 6rem; min-height: 25rem; ">
                            <div class="card-header text-center">
                                <h4>Print Hitam Putih + Warna</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-justify">Untuk print hitam putih + warna kertas A4 atau HVS dengan harga Rp.1000 per lembar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- label akhir -->


        <!-- harga -->
        <section class="label2" id="dfooter">
            <div class="container " id="syarat">
                <div class="row">
                    <div class="col text-center">
                        <br>
                        <h1>Syarat & ketentuan</h1>
                        <hr>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <div>
                            <div class="card text-white bg-primary mb-3 mt-" style="min-width: 6rem; min-height: 25rem; ">

                                <div class="card-header text-center">
                                    <h4>Ketentuan</h4>
                                </div>
                                <div class="card-body">

                                    <p class="card-text text-justify">Dokumen yang di upload minimal 25 halaman dan maksimal 100 halaman. Kamu juga dapat menggabungkan beberapa dokumen menjadi satu PDF, selama masih memenuhi ketentuan jumlah halaman.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-primary mb-3 mt-" style="min-width: 6rem; min-height: 25rem; ">
                            <div class="card-header text-center">
                                <h4>Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-justify">Dalam pembayaran harus dilakukan ditempat (tunai), jika pemesanan melebihi batas maksimal 30 lembar maka pembayaran harus dilakukan dengan dp.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-primary mb-3 mt-" style="min-width: 6rem; min-height: 25rem; ">
                            <div class="card-header text-center">
                                <h4>Pengambilan</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-justify">Pengambilan barang harus diambil langsung ke tempat percetakan atau bisa dengan system cod dengan syarat ketentuan minimal cetak 20 lembar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- harga akhir -->



        <!-- awal footer -->

        </footer> -->
        <footer>
            <div class="container">
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <p text-center>&copy; copyright 2019 | <a href="index.html">Mager printing</a></p>
                        </div>
                    </div>


                </div>
            </div>
        </footer>

        <script src="<?= base_url('assets/'); ?>cssindex/js/jquery-3.3.1.min.js"></script>
        <script src="<?= base_url('assets/'); ?>cssindex/js/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/'); ?>cssindex/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/'); ?>cssindex/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/'); ?>cssindex/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="<?= base_url('assets/'); ?>cssindex/js/scrolling-nav.js"></script>
        <script src="<?= base_url('assets/'); ?>cssindex/js/lightbox.js"></script>
    </body>

</html> 