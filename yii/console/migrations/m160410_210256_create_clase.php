<?php

use yii\db\Migration;

class m160410_210256_create_clase extends Migration
{
    public function safeUp()
    {
      $this->createTable('clase', [
          'idclase' => $this->primaryKey(),
          'nombre' => $this->string()->notNull(),
          'docente_idocente' => $this->integer()->notNull(),
          'modulo_has_asignatura_modulo_idmodulo' => $this->integer()->notNull(),
          'modulo_has_asignatura_asignatura_idasignatura' => $this->integer()->notNull(),
          'calendario_idcalendario' => $this->integer()->notNull(),
          'creado_por'              => $this->integer()->notNull(),
          'creado_en'               => $this->timestamp()->notNull(),
          'activo'                  => $this->integer()->notNull()->defaultValue(1)
      ]);

      $this->addForeignKey(
        'fk_clase_docente1_idx',
        'clase',
        'docente_idocente',
        'docente',
        'idocente',
        'NO ACTION',
        'NO ACTION'
      );

      $this->addForeignKey(
        'fk_clase_calendario1',
        'clase',
        'calendario_idcalendario',
        'calendario',
        'idcalendario',
        'NO ACTION',
        'NO ACTION'
      );

      $this->execute(
        'ALTER TABLE clase
        ADD CONSTRAINT fk_clase_modulo_has_asignatura1
        FOREIGN KEY(modulo_has_asignatura_modulo_idmodulo, modulo_has_asignatura_asignatura_idasignatura)
        REFERENCES modulo_has_asignatura(modulo_idmodulo, asignatura_idasignatura)'
      );

    }

    public function safeDown()
    {
      $this->dropForeignKey('fk_clase_modulo_has_asignatura1', 'clase');
      $this->dropForeignKey('fk_clase_calendario1', 'clase');
      $this->dropForeignKey('fk_clase_docente1_idx', 'clase');
      $this->dropTable('clase');
    }
}
