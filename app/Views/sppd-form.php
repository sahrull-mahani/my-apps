<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>
<form action="<?= site_url('print-sppd') ?>" method="post">
    <?= csrf_field() ?>
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
                <span class="input-group-text">Jabatan/Instansi</span>
                <input type="text" class="form-control" placeholder="Jabatan" name="jabatan[]" required>
            </div>
            <div class="input-group mb-1" id="nip">
                <span class="input-group-text" id="basic-addon1">NIP</span>
                <input type="text" class="form-control" placeholder="NIP" name="nip[]" required>
                <span class="input-group-text">Pangkat dan Golongan</span>
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
        <label for="angkutan" class="form-label">Alat Angkut</label>
        <input type="text" class="form-control" id="angkutan" name="angkutan" required>
    </div>
    <div class="mb-3">
        <label for="tujuan" class="form-label">Tujuan & Dari</label>
        <div class="input-group mb-3">
            <span for="tujuan" class="input-group-text">Tujuan</span>
            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan">
            <span for="dari" class="input-group-text">Berangkat Dari</span>
            <input type="text" class="form-control" id="dari" name="dari" placeholder="Berangkat Dari..">
        </div>
    </div>
    <div class="mb-3">
        <label for="maksud" class="form-label">Maksud</label>
        <input type="text" class="form-control" id="maksud" name="maksud" required>
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control date-range" id="jumlah" name="jumlah">
            <span class="input-group-text" id="null-tanggal" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kosongkan Tanggal"><i class="fa fa-trash"></i>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->endSection() ?>