<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartaiMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'partai_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_partai' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'no_urut' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
                'unique'     => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
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

        $this->forge->addKey('partai_id', true);
        $this->forge->createTable('tb_partai');
    }

    public function down()
    {
        $this->forge->dropTable('tb_partai');
    }
}
