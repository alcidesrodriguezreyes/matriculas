<?php

use yii\db\Migration;

class m160410_061754_create_matriculas_table extends Migration
{
    public function up()
    {
        $this->createTable('matriculas', [
            'idmatricula' => $this->primaryKey(),
            'fecha_matricula' => $this->timestamp()->notNull(),
            'valor' => $this->docuble()->notNull(),
            'estudiante_idestudiante' = $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('matriculas_table');
    }
}
