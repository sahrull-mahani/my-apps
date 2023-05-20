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
        $format = [
            'format'    => 'Legal',
            'default_font' => 'tahoma',
            'default_font_size' => 12,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 45,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 9,
        ];
        $mpdf = new \Mpdf\Mpdf($format);
        $mpdf->SetFont('tahoma');
        $pdfstyle = file_get_contents(__DIR__ . '/../../public/assets/css/pdf.css');
        $mpdf->WriteHTML($pdfstyle, \Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->SetTitle('SPT');
        $mpdf->SetSubject('Report');
        $mpdf->SetAuthor('MSM');

        $header = view('App\Views\pdf\header');
        $mpdf->defaultheaderline = 0;
        $mpdf->SetHeader($header);

        $html = view('pdf/main');
        $mpdf->WriteHTML($html);

        return redirect()->to($mpdf->Output());
    }
}
