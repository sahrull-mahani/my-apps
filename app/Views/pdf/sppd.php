<?php if ($to == 'kadis') : ?>
    <table class="tb-100">
        <tr>
            <td width="25">
                <img src="assets\img\logo bmu.png" width="60px" />
            </td>
            <td align="center" class="kop">
                <p class="kop-first-sppd fw-bold text-up">pemerintah kabupaten bolaang mongondow utara</p>
                <p class="kop-second-sppd fw-bold text-up">SEKRETARIAT DAERAH</p>
                <p class="kop-second fs-italic text-cap">Jln. Trans Sulawesi, No. 1 Boroko Kecamatan Kaidipang Kode Pos 95765</p>
            </td>
        </tr>
    </table>
    <div class="divider odd"></div>
    <div class="divider even"></div>
<?php else : ?>
    <table class="tb-100">
        <tr>
            <td width="25">
                <img src="assets\img\logo bmu.png" width="60px" />
            </td>
            <td align="center" class="kop">
                <p class="kop-first-sppd fw-bold text-up">PEMERINTAH KABUPATEN BOLAANG MONGONDOW UTARA</p>
                <p class="kop-second-sppd fw-bold text-up">DINAS KOMUNIKASI INFORMATIKA DAN PERSANDIAN</p>
                <p class="kop-second fs-italic text-cap">Jl. Imam Bonjol Boroko Kaidipange-Mail: kominfopersandian@gmail.com</p>
                <p class="kop-second fs-italic">Kode Pos 95765 No Telp :</p>
            </td>
        </tr>
    </table>
    <div class="divider odd"></div>
    <div class="divider even"></div>
<?php endif ?>

<table class="tb-100 mt-1">
    <tr>
        <td width="400"></td>
        <td>
            <table class="tb-100">
                <tr>
                    <td width="110">Lembaran ke</td>
                    <td>:</td>
                    <td>I,II,III,IV</td>
                </tr>
                <tr>
                    <td width="110">Kode No.</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td width="110">Nomor</td>
                    <td>:</td>
                    <td><?= "090/$nomor/KOMINFO/" . bulantoromawi(date('m')) . date('/Y') ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<p class="mt-1 fs-underline text-up mb-0 text-center">Surat Perjalanan Dinas</p>
<p class="text-up mt-0 text-center">(&nbsp;SPD&nbsp;)</p>

<table class="tb-100 mt-2 border-1 reset-table kop-second tb-padding-1 tb-v-top border-top-1">
    <tr>
        <td class="border-right-1 text-center" width="30">1.</td>
        <td>Pejabatyang memberi perintah</td>
        <td width="10">:</td>
        <td>Bupati Bolaang Mongondow Utara</td>
    </tr>
    <tr>
        <td class="border-right-1 text-center" width="30">2.</td>
        <td>Nama/NIP pegawai yang diperintahkan</td>
        <td width="10">:</td>
        <td>
            <p><?= $kepada[0]->nama ?></p>
            <p><?= $kepada[0]->nip ?></p>
        </td>
    </tr>
    <tr>
        <td class="border-right-1 text-center" width="30">3.</td>
        <td>
            <p>a) Pangkat dan Golongan</p>
            <p>b) Jabatan/Instansi</p>
            <p>c) Tingkat Biaya Perjalanan Dinas</p>
        </td>
        <td width="10">
            <p>:</p>
            <p>:</p>
            <p>:</p>
        </td>
        <td>
            <p><?= $kepada[0]->pangkat ?></p>
            <p><?= $kepada[0]->jabatan ?></p>
            <p>Kab. Bolaang Mongondow Utara</p>
        </td>
    </tr>
    <tr>
        <td class="border-right-1 text-center" width="30">4.</td>
        <td>Maksud Perjalanan Dinas</td>
        <td width="10">:</td>
        <td><?= $maksud ?></td>
    </tr>
    <tr>
        <td class="border-right-1 text-center" width="30">5.</td>
        <td>Alat Angkut yang dipergunakan</td>
        <td width="10">:</td>
        <td>Angkutan Darat</td>
    </tr>
    <tr>
        <td class="border-right-1 text-center" width="30">6.</td>
        <td>
            <p>a) Tempat Berangkat</p>
            <p>b) Tempat Tujuan</p>
        </td>
        <td width="10">
            <p>:</p>
            <p>:</p>
        </td>
        <td>
            <p><?= 'Boroko' ?></p>
            <p><?= $tujuan ?></p>
        </td>
    </tr>
    <tr>
        <td class="border-right-1 text-center" width="30">7.</td>
        <td>
            <p>a) Lamanya Perjalanan Dinas</p>
            <p>b) Tanggal Berangkat</p>
            <p>c) Tanggal Harus Kembali/Tiba Di tempat Baru *)</p>
        </td>
        <td width="10">
            <p>:</p>
            <p>:</p>
            <p>:</p>
        </td>
        <td>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) hari</p>
            <p><?= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . getBulan(date('m')) . ' ' . date('Y') ?></p>
            <p><?= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . getBulan(date('m')) . ' ' . date('Y') ?></p>
        </td>
    </tr>
</table>
<table class="tb-100 reset-table kop-second tb-padding-1 border-1 no-border-top tb-v-top">
    <tr>
        <td class="border-right-1 text-center" width="30" rowspan="2">8.</td>
        <td class="border-right-1 border-bottom-1 text-center">Pengikut : Nama</td>
        <td class="border-right-1 border-bottom-1 text-center">Tanggal Lahir</td>
        <td class="border-right-1 border-bottom-1 text-center">Keterangan</td>
    </tr>
    <tr>
        <td class="border-right-1">
            <p>a) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p>b) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p>c) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        </td>
        <td class="border-right-1"></td>
        <td class="border-right-1"></td>
    </tr>
</table>
<table class="tb-100 reset-table border-1 no-border-top kop-second tb-v-top tb-padding-1">
    <tr>
        <td class="border-right-1 text-center" width="30" rowspan="3">9.</td>
        <td colspan="3">Pembebanan Anggaran</td>
    </tr>
    <tr>
        <td width="300">a) Instansi</td>
        <td>:</td>
        <td>a. Dinas Komunikasi Informatika dan Persandian</td>
    </tr>
    <tr>
        <td width="300">b) Mata Anggaran</td>
        <td>:</td>
        <td><?= 'b. APBD Tahun ' . date('Y') ?></td>
    </tr>
</table>

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
                    <td><?= date('d') . ' ' . getBulan(date('m')) . ' ' . date('Y') ?></td>
                </tr>
            </table>

            <?php if ($to == 'kadis') : ?>
                <table class="tb-100 mt-1">
                    <tr>
                        <td align="center" class="fw-bold kop-second tb-td-h-0">a.n. <span class="text-up">Bupati Bolaang Mongondow Utara</span></td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second text-up">Sekertaris Daerah Kabupaten</td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second">Ub.</td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second text-up">Asisten Bidang ADMINISTRASI UMUM</td>
                    </tr>
                    <tr>
                        <td align="center" class="tb-td-h-2"></td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second fs-underline">UNTENG DATUNGSOLANG, S.Pd.M.Si</td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second text-up">Pembina Utama Muda</td>
                    </tr>
                    <tr>
                        <td align="center" class="fw-bold kop-second text-up">NIP. 19670721 199001 1 001</td>
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

<pagebreak />

<table class="tb-100 tb-padding-x-1 border-bottom-1 reset-table tb-v-top">
    <tr>
        <td width="5%" rowspan="5"></td>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%"></td>
        <td width="20%">SPD No.</td>
        <td width="5%">:</td>
        <td>094/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Setdakab/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<?= date('Y') ?></td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%"></td>
        <td width="20%">Berangkat dari</td>
        <td width="5%">:</td>
        <td>Boroko</td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%"></td>
        <td width="20%">Pada Tanggal</td>
        <td width="5%">:</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;) <?= getBulan(date('m')) . ' ' . date('Y') ?></td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%"></td>
        <td width="20%">Ke</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
</table>

&nbsp;

<table class="tb-100 tb-padding-x-1 border-bottom-1 reset-table tb-v-top mt-1">
    <tr>
        <td width="5%" rowspan="6">I</td>
        <td width="20%">Tiba di</td>
        <td width="1%">:</td>
        <td width="25%">Gorontalo</td>
        <td width="20%">Berangkat Dari</td>
        <td width="5%">:</td>
        <td>Gorontalo</td>
    </tr>
    <tr>
        <td width="20%">Pada Tanggal</td>
        <td width="1%">:</td>
        <td width="25%">&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;) <?= getBulan(date('m')) . ' ' . date('Y') ?></td>
        <td width="20%">Pada Tanggal</td>
        <td width="5%">:</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;) <?= getBulan(date('m')) . ' ' . date('Y') ?></td>
    </tr>
    <tr>
        <td width="20%">Kepala</td>
        <td width="1%">:</td>
        <td width="25%"></td>
        <td width="20%">Ke</td>
        <td width="5%">:</td>
        <td>Boroko</td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%"></td>
        <td width="20%">Kepala</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%">................................</td>
        <td width="20%"></td>
        <td width="5%"></td>
        <td>.........................................</td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
</table>

&nbsp;

<table class="tb-100 tb-padding-x-1 border-bottom-1 reset-table tb-v-top mt-1">
    <tr>
        <td width="5%" rowspan="6">II</td>
        <td width="20%">Tiba di</td>
        <td width="1%">:</td>
        <td width="25%"></td>
        <td width="20%">Berangkat Dari</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td width="20%">Pada Tanggal</td>
        <td width="1%">:</td>
        <td width="25%"></td>
        <td width="20%">Pada Tanggal</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td width="20%">Kepala</td>
        <td width="1%">:</td>
        <td width="25%"></td>
        <td width="20%">Ke</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%"></td>
        <td width="20%">Kepala</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%">................................</td>
        <td width="20%"></td>
        <td width="5%"></td>
        <td>.........................................</td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
</table>

&nbsp;

<table class="tb-100 tb-padding-x-1 border-bottom-1 reset-table tb-v-top mt-1">
    <tr>
        <td width="5%" rowspan="6">III</td>
        <td width="20%">Tiba di</td>
        <td width="1%">:</td>
        <td width="25%"></td>
        <td width="20%">Berangkat Dari</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td width="20%">Pada Tanggal</td>
        <td width="1%">:</td>
        <td width="25%"></td>
        <td width="20%">Pada Tanggal</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td width="20%">Kepala</td>
        <td width="1%">:</td>
        <td width="25%"></td>
        <td width="20%">Ke</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%"></td>
        <td width="20%">Kepala</td>
        <td width="5%">:</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
    <tr>
        <td width="20%"></td>
        <td width="1%"></td>
        <td width="25%">................................</td>
        <td width="20%"></td>
        <td width="5%"></td>
        <td>.........................................</td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
</table>

&nbsp;

<table class="tb-100 tb-padding-x-1 border-bottom-1 reset-table tb-v-top mt-1">
    <tr>
        <td width="5%" rowspan="4">IV</td>
        <td width="20%">Tiba / Kembali</td>
        <td width="1%">:</td>
        <td width="25%">Boroko</td>
        <td width="20%"></td>
        <td width="5%"></td>
        <td></td>
    </tr>
    <tr>
        <td width="20%">Pada Tanggal</td>
        <td width="1%">:</td>
        <td width="25%">&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;) <?= getBulan(date('m')) . ' ' . date('Y') ?></td>
        <td width="20%"></td>
        <td width="5%"></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" class="text-justify">Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.</td>
    </tr>
    <tr>
        <td colspan="6" class="text-center">
            &nbsp;
            <p class="fw-bold kop-second tb-td-h-0">a.n. <span class="text-up">Bupati Bolaang Mongondow Utara</span></p>
            <p class="fw-bold kop-second tb-td-h-0 text-up">Sekertaris Daerah Kabupaten</p>
            <p class="fw-bold kop-second tb-td-h-0">Ub.</p>
            <br><br><br><br><br><br>
            <p class="fw-bold kop-second tb-td-h-0 fs-underline">UNTENG DATUNGSOLANG, S.Pd.M.Si</p>
            <p class="fw-bold kop-second tb-td-h-0 text-up">Pembina Utama Muda</p>
            <p class="fw-bold kop-second tb-td-h-0 text-up">NIP. 19670721 199001 1 001</p>
        </td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
</table>

&nbsp;

<table class="tb-100 tb-padding-x-1 border-bottom-1 reset-table tb-v-top mt-1">
    <tr>
        <td width="5%">V</td>
        <td colspan="6">Catatan Lain - lain</td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-2"></td>
    </tr>
</table>

&nbsp;

<table class="tb-100 tb-padding-x-1 border-bottom-1 reset-table tb-v-top mt-1">
    <tr>
        <td width="5%" rowspan="3">VI</td>
        <td colspan="6">Perhatian &nbsp;&nbsp;&nbsp;:</td>
    </tr>
    <tr>
        <td colspan="6">
            Pejabat yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.
        </td>
    </tr>
    <tr>
        <td colspan="6" class="tb-td-h-01"></td>
    </tr>
</table>