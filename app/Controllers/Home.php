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
            'format'    => 'A4',
            'margin_left' => 20,
            'margin_right' => 20,
            'margin_top' => 30,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 9,
        ];
        $mpdf = new \Mpdf\Mpdf($format);
        $mpdf->SetTitle('judu l oke');
        // $html = view('pdf/main');
        $mpdf->WriteHTML('<h1>okok</h1>');

        return redirect()->to($mpdf->Output());
    }
}
