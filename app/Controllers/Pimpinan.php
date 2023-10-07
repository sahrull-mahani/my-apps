<?php

namespace App\Controllers;

use App\Models\PimpinanM;

class Pimpinan extends BaseController
{
    protected $pimpinanm, $data, $session;
    function __construct()
    {
        $this->pimpinanm = new PimpinanM();
    }
    public function index()
    {
        $data = array('judul' => 'Pimpinan', 'breadcome' => 'Pimpinan', 'url' => 'ajax-pimpinan/', 'm_pimpinan' => 'active', 'session' => $this->session);

        return view('App\Views\pimpinan\pimpinan_list', $data);
    }

    public function ajaxPimpinan()
    {
        $list = $this->pimpinanm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nip'] = $rows->nip;
            $row['nama'] = $rows->nama;
            $row['jabatan'] = $rows->jabatan;
            $row['pangkat'] = $rows->pangkat;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->pimpinanm->total(),
            "totalNotFiltered" => $this->pimpinanm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function create()
    {
        $data = array('action' => 'insert', 'btn' => '<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getVar('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++) {
            $d['nama'] = 'Data ' . $x;
            $data['form_input'][] = view('App\Views\pimpinan\form_input', $d);
        }
        $status['html']         = view('App\Views\pimpinan\form_modal', $data);
        $status['modal_title']  = 'Tambah Data Pimpinan';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getVar('id');
        $data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->pimpinanm->find($ids);
            $d = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $data['form_input'][] = view('App\Views\pimpinan\form_input', $d);
        }
        $status['html']         = view('App\Views\pimpinan\form_modal', $data);
        $status['modal_title']  = 'Update Data Pimpinan';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('id');
                $data = array();
                foreach ($nama as $key => $val) {
                    array_push($data, array(
                        'nip' => $this->request->getPost('nip')[$key],
                        'nama' => $this->request->getPost('nama')[$key],
                        'jabatan' => $this->request->getPost('jabatan')[$key],
                        'pangkat' => $this->request->getPost('pangkat')[$key],
                    ));
                }
                if ($this->pimpinanm->insertBatch($data)) {
                    $status['title'] = 'Berhasil';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pimpinan Tersimpan';
                } else {
                    $status['title'] = 'Gagal';
                    $status['type'] = 'error';
                    $status['text'] = $this->pimpinanm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'nip' => $this->request->getPost('nip')[$key],
                        'nama' => $this->request->getPost('nama')[$key],
                        'jabatan' => $this->request->getPost('jabatan')[$key],
                        'pangkat' => $this->request->getPost('pangkat')[$key],
                    ));
                }
                if ($this->pimpinanm->updateBatch($data, 'id')) {
                    $status['title'] = 'Berhasil';
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pimpinan Telah Di Ubah';
                } else {
                    $status['title'] = 'Gagal';
                    $status['type'] = 'error';
                    $status['text'] = $this->pimpinanm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->pimpinanm->delete($this->request->getPost('id'))) {
                    $status['title'] = 'Berhasil';
                    $status['type'] = 'success';
                    $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
                } else {
                    $status['title'] = 'Gagal';
                    $status['type'] = 'error';
                    $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                }
                echo json_encode($status);
                break;
        }
    }
}

/* End of file Pimpinan.php */
/* Location: ./app/controllers/Pimpinan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-10-07 14:17:49 */
/* http://harviacode.com */