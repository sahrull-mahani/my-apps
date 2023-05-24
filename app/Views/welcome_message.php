<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Apps</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- daterangepicker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- my style -->
    <link rel="stylesheet" href="<?= site_url('assets/css/styles.css') ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">MY APPS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">SPT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SPPD</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <form action="<?= site_url('print') ?>" method="post">
            <div class="mb-3">
                <label for="to" class="form-label">Kadis atau bukan?</label>
                <select class="form-select" id="to" name="to">
                    <option value="kadis" selected>Kadis</option>
                    <option value="thl">THL</option>
                    <option value="pns">PNS</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="font" class="form-label">Font</label>
                <select class="form-select" id="font" name="font">
                    <option value="Bookman Old Style" selected>Bookman Old Style</option>
                    <option value="tahoma">Tahoma</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor</label>
                <input type="number" min="1" class="form-control" id="nomor" name="nomor">
            </div>
            <div>
                <label for="dasar" class="form-label">Dasar</label>
                <input type="text" class="form-control" id="dasar" name="dasar">
            </div>
            <div class="copy-text mt-1">
                <div class="input-group mb-3">
                    <input type="text" id="copy-text" class="form-control bg-disabled" readonly role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Salin ke papan klip" value="Surat KPP Pratama Kotamobagu nomor : S-1884/KPP.1607/2022 dan Surat KPP Pratama Kotamobagu Nomor : S-33/KPP.1607/2023 Tentang Imbauan Pemenuhan Kewajiban Perpajakan Instansi Pemerintah Daerah." />
                    <span class="input-group-text" id="btn-copy-clip" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Salin ke papan klip"><i class="fa fa-clone"></i>
                    </span>
                </div>
            </div>
            <div class="wrapper mb-3">
                <label>Kepada</label>
                <div class="element">
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">Nama</span>
                        <input type="text" class="form-control" placeholder="Nama" name="nama[]" required>
                        <span class="input-group-text">Jabatan</span>
                        <input type="text" class="form-control" placeholder="Jabatan" name="jabatan[]" required>
                    </div>
                    <div class="input-group mb-1" id="nip">
                        <span class="input-group-text" id="basic-addon1">NIP</span>
                        <input type="text" class="form-control" placeholder="NIP" name="nip[]" required>
                        <span class="input-group-text">Pangkat</span>
                        <input type="text" class="form-control" placeholder="Pangkat" name="pangkat[]" required>
                    </div>
                </div>
                <div class="results"></div>

                <div class="mt-2 mb-3">
                    <button class="btn btn-primary btn-sm clone" type="button">+</button>
                    <button class="btn btn-danger btn-sm remove" type="button" disabled>-</button>
                </div>
            </div>
            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" required>
            </div>
            <div class="mb-3">
                <label for="maksud" class="form-label">Maksud</label>
                <input type="text" class="form-control" id="maksud" name="maksud" required>
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control date-range" id="jumlah" name="jumlah">
                    <span class="input-group-text" id="null-tanggal" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kosongkan Tanggal"><i class="fa fa-trash"></i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= site_url('assets/js/script.js') ?>"></script>
</body>

</html>