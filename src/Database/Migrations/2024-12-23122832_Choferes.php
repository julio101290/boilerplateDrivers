<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Choferes extends Migration {

    public function up() {
        // Choferes
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'nombre' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'Apellido' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'tipoFigura' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'RFCFigura' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'numLicencia' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'MunicipioFigura' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'EstadoFigura' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'PaisFigura' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'CodigoPostalFigura' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('choferes', true);
    }

    public function down() {
        $this->forge->dropTable('choferes', true);
    }
}
