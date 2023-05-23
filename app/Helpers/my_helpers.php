<?php

function getBulan($bulan)
{
    switch ($bulan) {
        case "01":
            $bln = 'Januari';
            break;
        case "02":
            $bln = 'Februari';
            break;
        case "03":
            $bln = 'Maret';
            break;
        case "04":
            $bln = 'April';
            break;
        case "05":
            $bln = 'Mei';
            break;
        case "06":
            $bln = 'Juni';
            break;
        case "07":
            $bln = 'Juli';
            break;
        case "08":
            $bln = 'Agustus';
            break;
        case "09":
            $bln = 'September';
            break;
        case "10":
            $bln = 'Oktober';
            break;
        case "11":
            $bln = 'November';
            break;
        case "12":
            $bln = 'Desember';
            break;
    }
    return $bln;
}

function bulantoromawi($bulan)
{
    switch ($bulan) {
        case "01":
            $bln = 'I';
            break;
        case "02":
            $bln = 'II';
            break;
        case "03":
            $bln = 'III';
            break;
        case "04":
            $bln = 'IV';
            break;
        case "05":
            $bln = 'V';
            break;
        case "06":
            $bln = 'VI';
            break;
        case "07":
            $bln = 'VII';
            break;
        case "08":
            $bln = 'VIII';
            break;
        case "09":
            $bln = 'IX';
            break;
        case "10":
            $bln = 'X';
            break;
        case "11":
            $bln = 'XI';
            break;
        case "12":
            $bln = 'XII';
            break;
    }
    return $bln;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}

function tmtDate($tmt)
{
    $tmt = explode(' - ', $tmt);
    $starts = $tmt[0];
    $ends = $tmt[1];

    $start = date('d', strtotime($starts)) . ' ' . getBulan(date('m', strtotime($starts)));
    $end = date('d', strtotime($ends)) . ' ' . getBulan(date('m', strtotime($ends)));
    $year = date('Y', strtotime($starts)) == date('Y', strtotime($ends)) ? date('Y', strtotime($starts)) : date('Y');
    $hari = date('d', strtotime($ends)) - date('d', strtotime($starts)) + 1;

    return "$hari (" . ucwords(terbilang($hari)) . ") hari TMT $start s/d $end $year";
}