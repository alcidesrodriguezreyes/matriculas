<?php

use yii\db\Migration;

class m160410_201953_create_modulo_has_asignatura extends Migration
{
    public function up()
    {
        $this->createTable('modulo_has_asignatura', [
          'modulo_idmodulo' => $this->integer()->notNull(),
          'asignatura_idasignatura' => $this->integer()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('modulo_has_asignatura');
    }
}
