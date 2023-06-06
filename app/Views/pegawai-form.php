<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>
<form action="<?= site_url('save-pegawai') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip" required>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama & Gelar</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan & Pangkat</label>
        <div class="input-group mb-3">
            <span for="jabatan" class="input-group-text">Jabatan</span>
            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="contoh: Kepala Dinas...">
            <span for="pangkat" class="input-group-text">Pangkat</span>
            <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="contoh: Pembina Muda...">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->endSection() ?>