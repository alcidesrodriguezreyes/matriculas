<?php

use yii\db\Migration;

class m160411_024703_create_clase_has_estudiante extends Migration
{
    public function safeUp()
    {
        $this->createTable('clase_has_estudiante', [
            'clase_idclase' => $this->integer()->notNull(),
            'estudiante_idestudiante'=> $this->integer()->notNull()
        ]);

      $this->addPrimaryKey(
        'clase_has_estudiante_pk1',
        'clase_has_estudiante',
        'clase_idclase,estudiante_idestudiante'
      );

        $this->addForeignKey(
          'fk_clase_has_estudiante_clase1',
          'clase_has_estudiante',
          'clase_idclase',
          'clase',
          'idclase',
          'NO ACTION',
          'NO ACTION'
        );

        $this->addForeignKey(
          'fk_clase_has_estudiante_estudiante1',
          'clase_has_estudiante',
          'estudiante_idestudiante',
          'estudiante',
          'idestudiante',
          'NO ACTION',
          'NO ACTION'
        );
    }

    public function safeDown()
    {
      $this->dropForeignKey('fk_clase_has_estudiante_clase1');
      $this->dropForeignKey('fk_clase_has_estudiante_estudiante1');
      $this->dropTable('clase_has_estudiante');
    }
}
