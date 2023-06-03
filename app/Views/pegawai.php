<?= $this->extend('index'); ?>
<?= $this->section('content'); ?>

<a href="<?= site_url('pegawai-form') ?>" class="mb-3 btn btn-primary">Tambah</a>
<table class="table tb-sm" id="my-table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Pangkat</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pegawai as $key => $row) : ?>
            <tr>
                <th scope="row"><?= $key+1 ?></th>
                <td><?= $row->nip ?></td>
                <td><?= $row->nama ?></td>
                <td><?= $row->jabatan ?></td>
                <td><?= $row->pangkat ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>