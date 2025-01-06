<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNilaiMahasiswaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mahasiswa_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'mata_kuliah_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'semester' => [
                'type'       => 'INT',
                'constraint' => 2,
            ],
            'nilai' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('mahasiswa_id', 'mahasiswa', 'id', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('mata_kuliah_id', 'mata_kuliah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('nilai_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('nilai_mahasiswa');
    }
}
