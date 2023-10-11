<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="row mb-3">
    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
    <div class="col-sm-9 position-relative">
        <input type="text" class="form-control" id="nip" name="nip[]" value="<?= @$get->nip ?>" placeholder="Contoh: 19292xxxxx OR jika tidak punya maka kosongkan kolom ini" />
    </div>
</div>
<div class="row mb-3">
    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-9 position-relative">
        <input type="text" class="form-control" id="nama" name="nama[]" value="<?= @$get->nama ?>" placeholder="Firgoun Djaf" required />
        <div class="invalid-tooltip">
            Nama Tidak Boleh Kosong.
        </div>
    </div>
</div>
<div class="row mb-3">
    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
    <div class="col-sm-9 position-relative">
        <input type="text" class="form-control" id="jabatan" name="jabatan[]" value="<?= @$get->jabatan ?>" placeholder="Executor" required />
        <div class="invalid-tooltip">
            Jabatan Tidak Boleh Kosong.
        </div>
    </div>
</div>
<div class="row mb-3">
    <label for="pangkat" class="col-sm-3 col-form-label">Pangkat</label>
    <div class="col-sm-9 position-relative">
        <input type="text" class="form-control" id="pangkat" name="pangkat[]" value="<?= @$get->pangkat ?>" placeholder="Conth: Pembina Massal OR jika tidak punya maka kosongkan kolom ini" />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= @$get->id ?>" />