<?php

use yii\db\Migration;

class m160410_172915_create_periodo_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('periodo', [
            'idperiodo'           => $this->primaryKey(),
            'nombre'              => $this->string()->notNull(),
            'año'                 => $this->integer()->notNull(),
            'numero_modulos'      => $this->integer()->notNull(),
            'programa_idprograma' => $this->integer()->notNull(),
            'creado_por'          => $this->integer()->notNull(),
            'creado_en'           => $this->timestamp()->notNull(),
            'activo'              => $this->integer()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
          'fk_periodo_programa1',
          'periodo',
          'programa_idprograma',
          'programa',
          'idprograma',
          'NO ACTION',
          'NO ACTION'
        );
    }

    public function safeDown()
    {
      $this->dropForeignKey('fk_periodo_programa1', 'periodo');
      $this->dropTable('periodo');
    }
}
