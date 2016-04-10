<?php

use yii\db\Migration;

class m160410_194820_create_calendario extends Migration
{
    public function up()
    {
        $this->createTable('calendario', [
            'idcalendario'  => $this->primaryKey(),
            'nombre'        => $this->string()->notNull(),
            'inicio'        => $this->date()->notNull(),
            'final'         => $this->date()->notNull(),
            'recurrencia'   => $this->string()->notNull()->defaultValue('diaria'),
            'hora'          => $this->time()->notNull(),
            'creado_por'    => $this->integer()->notNull(),
            'creado_en'     => $this->timestamp()->notNull(),
            'activo'        => $this->integer()->notNull()->defaultValue(1)
        ]);
    }

    public function down()
    {
        $this->dropTable('calendario');
    }
}
