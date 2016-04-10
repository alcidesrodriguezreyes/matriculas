<?php

use yii\db\Migration;

class m160410_162707_create_programa_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('programa', [
          'idprograma'          => $this->primaryKey(),
          'nombre'              => $this->string()->notNull(),
          'numero_periodos'     => $this->integer(),
          'docente_idocente'    => $this->integer()->notNull(),
          'creado_por'          => $this->integer()->notNull(),
          'creado_en'           => $this->timestamp()->notNull(),
          'activo'              => $this->integer()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
          'fk_programa_docente1',
          'programa',
          'docente_idocente',
          'docente',
          'idocente',
          'NO ACTION',
          'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_programa_docente1', 'programa');
        $this->dropTable('programa');
    }
}
