<?php

use yii\db\Migration;

class m160410_201953_create_modulo_has_asignatura extends Migration
{
    public function safeUp()
    {
        $this->createTable('modulo_has_asignatura', [
          'modulo_idmodulo' => $this->integer()->notNull(),
          'asignatura_idasignatura' => $this->integer()->notNull()
        ]);
        $this->execute(
          'ALTER TABLE modulo_has_asignatura ADD PRIMARY KEY (modulo_idmodulo, asignatura_idasignatura)'
        );
        
        $this->addForeignKey(
          'fk_modulo_has_asignatura_modulo1',
          'modulo_has_asignatura',
          'modulo_idmodulo',
          'modulo',
          'idmodulo',
          'NO ACTION',
          'NO ACTION'
        );
        $this->addForeignKey(
          'fk_modulo_has_asignatura_asignatura1',
          'modulo_has_asignatura',
          'asignatura_idasignatura',
          'asignatura',
          'idasignatura',
          'NO ACTION',
          'NO ACTION'
        );
    }

    public function safeDown()
    {
      $this->dropForeignKey('fk_modulo_has_asignatura_modulo1', 'modulo_has_asignatura');
      $this->dropForeignKey('fk_modulo_has_asignatura_asignatura1', 'modulo_has_asignatura');
      $this->dropTable('modulo_has_asignatura');
    }
}
