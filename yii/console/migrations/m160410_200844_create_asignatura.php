<?php

use yii\db\Migration;

class m160410_200844_create_asignatura extends Migration
{
    public function up()
    {
        $this->createTable('asignatura', [
            'idasignatura' => $this->primaryKey(),
            'nombre'       => $this->string()->notNull(),
            'creado_por'   => $this->integer()->notNull(),
            'creado_en'    => $this->timestamp()->notNull(),
            'activo'       => $this->integer()->notNull()->defaultValue(1)
        ]);
    }

    public function down()
    {
        $this->dropTable('asignatura');
    }
}
