<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Maps extends BaseController
{
    public function index()
    {
        $data = [
            'judul'         => 'Maps',
            'leaflet'       => true,
            'maps_active'   => 'active'
        ];
        return view('maps/index', $data);
    }

    public function apidata()
    {
        $data = [
            '7501' => [
                'populasi'  => 398801
            ],
            '7502' => [
                'populasi'  => 148256
            ],
            '7503' => [
                'populasi'  => 149297
            ],
            '7504' => [
                'populasi'  => 166200
            ],
            '7505' => [
                'populasi'  => 168263
            ],
            '7571' => [
                'populasi'  => 201350
            ],
        ];
        return $this->response->setJSON($data, 200);
    }
}
