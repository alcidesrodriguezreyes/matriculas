<?php

use yii\db\Migration;

class m160411_033454_create_nota extends Migration
{
    public function safeUp()
    {
        $this->createTable('nota', [
            'idnota'        => $this->primaryKey(),
            'valor'         => $this->double()->notNull(),
            'order'         => $this->integer()->notNull(),
            'clase_has_estudiante_clase_idclase' => $this->integer()->notNull(),
            'clase_has_estudiante_estudiante_idestudiante' => $this->integer()->notNull(),
            'creado_por'    => $this->integer()->notNull(),
            'creado_en'     => $this->timestamp()->notNull(),
            'activo'        => $this->integer()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
          'fk_nota_clase_has_estudiante1',
          'nota',
          'clase_has_estudiante_clase_idclase,clase_has_estudiante_estudiante_idestudiante',
          'clase_has_estudiante',
          'clase_idclase,estudiante_idestudiante',
          'NO ACTION',
          'NO ACTION'
        );
    }

    public function safeDown()
    {
      $this->dropForeignKey('fk_nota_clase_has_estudiante1', 'nota');
        $this->dropTable('nota');
    }
}
