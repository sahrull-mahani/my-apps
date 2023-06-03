<?php

namespace App\Models;

use CodeIgniter\Model;

class PemimpinM extends Model
{
    protected $table            = 'pimpinan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama', 'jabatan', 'pangkat'];
}
