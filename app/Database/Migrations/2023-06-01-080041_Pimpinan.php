<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pimpinan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nip' => ['type' => 'char', 'constraint' => 100],
            'nama' => ['type' => 'char', 'constraint' => 150],
            'jabatan' => ['type' => 'char', 'constraint' => 200],
            'pangkat' => ['type' => 'char', 'constraint' => 150],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pimpinan', true);
    }

    public function down()
    {
        $this->forge->dropTable('pimpinan', true);
    }
}
