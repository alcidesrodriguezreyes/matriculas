<?php

use yii\db\Migration;

class m160410_061754_create_matriculas_table extends Migration
{
    public function up()
    {
        $this->createTable('matriculas', [
            'idmatricula'             => $this->primaryKey(),
            'fecha_matricula'         => $this->timestamp()->notNull(),
            'valor'                   => $this->double()->notNull(),
            'estudiante_idestudiante' => $this->integer()->notNull(),
            'grupo'                   => $this->string(),
            'estado'                  => $this->integer()->notNull()->defaultValue(1),
            'periodo_idperiodo'       => $this->integer()->notNull(),
            'creado_por'              => $this->integer()->notNull(),
            'creado_en'               => $this->timestamp()->notNull(),
            'activo'                  => $this->integer()->notNull()->defaultValue(1)
        ]);
    }

    public function down()
    {
        $this->dropTable('matriculas');
    }
}
