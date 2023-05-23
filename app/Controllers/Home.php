<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function print()
    {
        $nomor = $this->request->getPost('nomor');
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');
        $kepada = [];
        foreach ($nama as $key => $row) {
            array_push($kepada, (object)[
                'nama'=>$row,
                'jabatan'=>$jabatan[$key]
            ]);
        }
        $dasar = $this->request->getPost('dasar');
        $data = [
            'nomor'     => empty($nomor) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : sprintf('%02d', $nomor),
            'dasar'     => !empty($dasar) ? [$dasar] : null,
            'kepada'    => $kepada,
            'tujuan'    => $this->request->getPost('tujuan'),
            'maksud'    => $this->request->getPost('maksud'),
            'jumlah'    => $this->request->getPost('jumlah'),
            'biaya'     => 'APBD Tahun 2023'
        ];
        $format = [
            'format'    => 'Legal',
            'default_font' => 'Bookman Old Style',
            'default_font_size' => 12,
            'margin_left' => 10,
            'margin_right' => 15,
            'margin_top' => 45,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 9,
        ];
        $mpdf = new \Mpdf\Mpdf($format);
        $mpdf->SetFont('Bookman Old Style');
        $pdfstyle = file_get_contents(__DIR__ . '/../../public/assets/css/pdf.css');
        $mpdf->WriteHTML($pdfstyle, \Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->SetTitle('SPT');
        $mpdf->SetSubject('Report');
        $mpdf->SetAuthor('MSM');

        $header = view('App\Views\pdf\header');
        $mpdf->defaultheaderline = 0;
        $mpdf->SetHeader($header);

        $html = view('pdf/main', $data);
        $mpdf->WriteHTML($html);

        return redirect()->to($mpdf->Output());
    }
}
