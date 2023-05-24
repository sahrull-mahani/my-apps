<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul'         => 'SPT FORM',
            'spt_active'    => 'active'
        ];
        return view('spt-form', $data);
    }
    
    public function sppd()
    {
        $data = [
            'judul'         => 'SPT FORM',
            'sppd_active'   => 'active'
        ];
        return view('sppd-form', $data);
    }

    public function print_spt()
    {
        $to = $this->request->getPost('to');
        $font = $this->request->getPost('font');
        $nomor = $this->request->getPost('nomor');
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');
        $nip = $to != 'thl' ? $this->request->getPost('nip') : null;
        $pangkat = $to != 'thl' ? $this->request->getPost('pangkat') : null;
        $kepada = [];
        foreach ($nama as $key => $row) {
            array_push($kepada, (object)[
                'nama'=>$row,
                'jabatan'=>$jabatan[$key],
                'nip'=>$nip[$key] ?? null,
                'pangkat'=>$pangkat[$key] ?? null,
            ]);
        }
        $dasar = $this->request->getPost('dasar');
        $data_header = [
            'to'        => $to
        ];
        $jumlah = $this->request->getPost('jumlah');
        if ($jumlah === null || $jumlah == 'kosong') {
            $jumlah = null;
        }
        $data = [
            'to'        => $to,
            'nomor'     => empty($nomor) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : sprintf('%02d', $nomor),
            'dasar'     => !empty($dasar) ? [$dasar] : null,
            'kepada'    => $kepada,
            'tujuan'    => $this->request->getPost('tujuan'),
            'maksud'    => $this->request->getPost('maksud'),
            'jumlah'    => $jumlah,
            'biaya'     => 'APBD Tahun ' . date('Y')
        ];
        $format = [
            'format'    => 'Legal',
            'default_font' => $font,
            'default_font_size' => 12,
            'margin_left' => 10,
            'margin_right' => 15,
            'margin_top' => $to == 'kadis' ? 52 : 45,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 9,
        ];
        $mpdf = new \Mpdf\Mpdf($format);
        $mpdf->SetFont($font);
        $pdfstyle = file_get_contents(__DIR__ . '/../../public/assets/css/pdf.css');
        $mpdf->WriteHTML($pdfstyle, \Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->SetTitle('SPT');
        $mpdf->SetSubject('Report');
        $mpdf->SetAuthor('MSM');

        $header = view('App\Views\pdf\header', $data_header);
        $mpdf->defaultheaderline = 0;
        $mpdf->SetHeader($header);

        $html = view('pdf/spt', $data);
        $mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('SPT.pdf','I');
        // return redirect()->to($mpdf->Output());
    }

    public function print_sppd()
    {
        $to = $this->request->getPost('to');
        $font = $this->request->getPost('font');
        $nomor = $this->request->getPost('nomor');
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');
        $nip = $to != 'thl' ? $this->request->getPost('nip') : null;
        $pangkat = $to != 'thl' ? $this->request->getPost('pangkat') : null;
        $kepada = [];
        foreach ($nama as $key => $row) {
            array_push($kepada, (object)[
                'nama'=>$row,
                'jabatan'=>$jabatan[$key],
                'nip'=>$nip[$key] ?? null,
                'pangkat'=>$pangkat[$key] ?? null,
            ]);
        }
        $dasar = $this->request->getPost('dasar');
        $jumlah = $this->request->getPost('jumlah');
        if ($jumlah === null || $jumlah == 'kosong') {
            $jumlah = null;
        }
        $data = [
            'to'        => $to,
            'nomor'     => empty($nomor) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : sprintf('%02d', $nomor),
            'dasar'     => !empty($dasar) ? [$dasar] : null,
            'kepada'    => $kepada,
            'tujuan'    => $this->request->getPost('tujuan'),
            'maksud'    => $this->request->getPost('maksud'),
            'jumlah'    => $jumlah,
            'biaya'     => 'APBD Tahun ' . date('Y')
        ];
        $format = [
            'format'    => 'Legal',
            'default_font' => $font,
            'default_font_size' => 12,
            'margin_left' => 10,
            'margin_right' => 15,
            'margin_top' => 8,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 9,
        ];
        $mpdf = new \Mpdf\Mpdf($format);
        $mpdf->SetFont($font);
        $pdfstyle = file_get_contents(__DIR__ . '/../../public/assets/css/pdf.css');
        $mpdf->WriteHTML($pdfstyle, \Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->SetTitle('SPPD');
        $mpdf->SetSubject('Report');
        $mpdf->SetAuthor('MSM');

        $html = view('pdf/sppd', $data);
        $mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('SPT.pdf','I');
        // return redirect()->to($mpdf->Output());
    }
}
