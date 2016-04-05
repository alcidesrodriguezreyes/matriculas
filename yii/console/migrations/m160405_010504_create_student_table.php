<?php

use yii\db\Migration;

class m160405_010504_create_student_table extends Migration
{
    public function up()
    {
        $this->createTable('estudiante', [
            'idestudiante'        => $this->primaryKey(),
            'tipo_identificacion' => $this->integer()->notNull(),
            'identificacion'      => $this->string()->notNull()->unique(),
            'nombres'             => $this->string()->notNull(),
            'apellidos'           => $this->string()->notNull(),
            'direccion'           => $this->string()->notNull(),
            'telefono'            => $this->string()->notNull(),
            'celular'             => $this->string()->notNull(),
            'email'               => $this->string()->notNull()->unique(),
            'creado_por'          => $this->integer()->notNull(),
            'creado_en'           => $this->timestamp()->notNull(),
            'activo'              => $this->integer()->notNull()->defaultValue(1)
        ]);
    }

    public function down()
    {
        $this->dropTable('estudiante');
    }
}
