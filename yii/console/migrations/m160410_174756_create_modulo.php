<?php

use yii\db\Migration;

class m160410_174756_create_modulo extends Migration
{
    public function safeUp()
    {
        $this->createTable('modulo', [
            'idmodulo' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'periodo_idperiodo' => $this->integer()->notNull(),
            'creado_por'          => $this->integer()->notNull(),
            'creado_en'           => $this->timestamp()->notNull(),
            'activo'              => $this->integer()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
          'fk_modulo_periodo1',
          'modulo',
          'periodo_idperiodo',
          'periodo',
          'idperiodo',
          'NO ACTION',
          'NO ACTION'
        );
    }

    public function safeDown()
    {
      $this->dropForeignKey('fk_modulo_periodo1', 'modulo');
      $this->dropTable('modulo');
    }
}
