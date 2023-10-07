<?= $this->extend("index"); ?>
<?= $this->section("content") ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Data Pegawai</h5>
        <div class="btn-group" role="group" id="toolbar">
            <input type="number" class="btn btn-secondary btn-sm numeric" value="1" min="1" id="number-of-row">
            <button type="button" class="btn btn-primary btn-sm" id="create" method="create-pimpinan"><i class="bi bi-plus-square"></i> Tambah Data</button>
            <button type="button" class="btn btn-warning btn-sm" id="edit-dt" method="edit-pimpinan" disabled><i class="bi bi-pencil-square"></i> Edit Data</button>
            <button type="button" class="btn btn-danger btn-sm" id="remove-dt" disabled method="save-pimpinan"><i class="bi bi-trash-fill"></i> Hapus</button>
        </div>
        <table class="table table-borderless datatable" data-toggle="table" data-ajax="ajaxDT" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" data-visible="false">ID</th>
                    <th data-field="nomor">No</th>
                    <th data-field="nip">Nip</th>
                    <th data-field="nama">Nama</th>
                    <th data-field="jabatan">Jabatan</th>
                    <th data-field="pangkat">Pangkat</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?= $this->endSection() ?>