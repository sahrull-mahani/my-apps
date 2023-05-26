<?php if ($to == 'kadis') : ?>
    <div class="kop-second fw-bold text-center">Nomor: <?= "090/$nomor/SETDAKAB/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . date('/Y') ?></div>
<?php else : ?>
    <div class="kop-first fw-bold fs-underline text-up text-center">surat perintah tugas</div>
    <div class="kop-second fw-bold text-center mb-2">Nomor: <?= "090/$nomor/KOMINFO/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . date('/Y') ?></div>
<?php endif ?>

<table class="tb-100 tb-v-top">
    <tr>
        <td width="180">Dasar</td>
        <td width="30">:</td>
        <td>
            <table class="reset-table borderless tb-100">
                <tr>
                    <td width="25">1.</td>
                    <td class="text-justify">Peraturan Bupati Bolaang Mongondow Utara Nomor 01 Tahun 2023 Tentang Perjalanan Dinas Bagi Pejabat Negara, Pimpinan dan Anggota Dewan Perwakilan Rakyat Daerah, Aparat Sipil Negara, Pejabat lainnya dan Tenaga Karyawan Lepas Tahun 2023;</td>
                </tr>
                <?php if ($dasar != null) : ?>
                    <?php foreach ($dasar as $key => $row) : ?>
                        <tr>
                            <td width="25"><?= $key + 2 . '.' ?></td>
                            <td class="text-justify"><?= $row ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </table>
        </td>
    </tr>
</table>

<div class="fw-bold text-up text-center mt-2">menugaskan</div>

<table class="tb-100 tb-v-top mt-2">
    <tr>
        <td width="180">Kepada</td>
        <td width="30">:</td>
        <td>
            <table class="reset-table tb-100">
                <?php $totalkepada = count($kepada) ?>
                <?php foreach ($kepada as $key => $row) : ?>
                    <tr>
                        <?php if ($totalkepada > 1) : ?>
                            <td width="25"><?= $key + 1 . '.' ?></td>
                        <?php endif ?>
                        <td>
                            <?php if ($to == 'kadis' || $to == 'pns') : ?>
                                <table class="reset-table tb-100 tb-h-1">
                                    <tr>
                                        <td width="100">Nama</td>
                                        <td width="5">:</td>
                                        <td class="fw-bold"><?= $row->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td width="100">NIP</td>
                                        <td width="5">:</td>
                                        <td><?= $row->nip ?></td>
                                    </tr>
                                    <tr>
                                        <td width="100">Pangkat</td>
                                        <td width="5">:</td>
                                        <td><?= $row->pangkat ?></td>
                                    </tr>
                                    <tr>
                                        <td width="100">Jabatan</td>
                                        <td width="5">:</td>
                                        <td><?= $row->jabatan ?></td>
                                    </tr>
                                </table>
                            <?php else : ?>
                                <table class="reset-table tb-100 tb-h-1">
                                    <tr>
                                        <td width="100">Nama</td>
                                        <td width="5">:</td>
                                        <td class="fw-bold"><?= $row->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td width="100">Jabatan</td>
                                        <td width="5">:</td>
                                        <td><?= $row->jabatan ?></td>
                                    </tr>
                                </table>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </td>
    </tr>
</table>

<table class="tb-100 tb-v-top mt-1">
    <tr>
        <td width="180">Tujuan</td>
        <td width="30">:</td>
        <td><?= $tujuan ?></td>
    </tr>
</table>

<table class="tb-100 tb-v-top">
    <tr>
        <td width="180">Maksud</td>
        <td width="30">:</td>
        <td><?= $maksud ?></td>
    </tr>
</table>

<table class="tb-100 tb-v-top">
    <tr>
        <td width="180">Jumlah Hari</td>
        <td width="30">:</td>
        <td><?= $jumlah !== null ? tmtDate($jumlah, 'spt') : '&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) hari TMT &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; s/d &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2023' ?></td>
    </tr>
</table>

<table class="tb-100 tb-v-top">
    <tr>
        <td width="180">Pembebanan Biaya</td>
        <td width="30">:</td>
        <td><?= $biaya ?></td>
    </tr>
</table>

Agar melaporkan hasil perjalanannya sekembali dari tugas dimaksud. Demikian Perintah Tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.

<table class="tb-100 mt-2">
    <tr>
        <td width="350"></td>
        <td>
            <table class="tb-100 bt-1">
                <tr>
                    <td>Dikeluarkan di</td>
                    <td>:</td>
                    <td>B o r o k o</td>
                </tr>
                <tr>
                    <td>Pada Tanggal</td>
                    <td>:</td>
                    <td><?= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . date('Y') ?></td>
                </tr>
            </table>

            <?php if ($to == 'kadis') : ?>
                <table class="tb-100 mt-1">
                    <tr>
                        <td align="center" class="fw-bold kop-second text-up text-up">Bupati Bolaang Mongondow Utara</td>
                    </tr>
                    <tr>
                        <td align="center" class="tb-td-h-2"></td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second text-up">Depri Pontoh</td>
                    </tr>
                </table>
            <?php else : ?>
                <table class="tb-100 mt-1">
                    <tr>
                        <td align="center" class="fw-bold kop-second text-up">Kepala Dinas</td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold text-up kop-second">Komunikasi Informatika dan Persandian</td>
                    </tr>
                    <tr>
                        <td align="center" class="tb-td-h-2"></td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold fs-underline kop-second">Aang Wardiman, AK.CA.,CertDA.,CTT</td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second">Pembina Utama Muda IV/c</td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second">NIP. 19641024 198603 1 002</td>
                    </tr>
                </table>
            <?php endif ?>
        </td>
    </tr>
</table>

<div class="fs-italic mt-2">Tembusan : Arsip,-</div>