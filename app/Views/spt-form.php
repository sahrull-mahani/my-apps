<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<form action="<?= site_url('print-spt') ?>" method="post" target="_blank">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="to" class="form-label">Kadis atau bukan?</label>
        <select class="form-select" id="to" name="to" data-tipe="spt">
            <option value="kadis" selected>Kadis</option>
            <option value="thl">THL</option>
            <option value="pns">PNS</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="font" class="form-label">Font</label>
        <select class="form-select" id="font" name="font">
            <option value="bookmanoldstyle" selected>Bookman Old Style</option>
            <option value="tahoma">Tahoma</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="nomor" class="form-label">Nomor</label>
        <input type="number" min="1" class="form-control" id="nomor" name="nomor">
    </div>
    <div class="mb-3">
        <label for="dasar" class="form-label">Dasar</label>
        <input type="text" class="form-control" id="dasar" name="dasar">
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
    <div class="mb-3">
        <label for="ttd" class="form-label">Tanda Tangan</label>
        <select class="form-select" id="ttd" name="ttd"></select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->endSection() ?>