<?php

use yii\db\Migration;

/**
 * Handles the creation of table `activity`.
 */
class m170303_180611_create_activity_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%activity}}', [
            'id' => $this->primaryKey(),
            'worker_id' => $this->integer()->notNull()->comment('id сотрудника'),
            'db_table' => $this->string()->notNull()->comment('Таблица базы данных'),
            'timestamp' => $this->date()->comment('временная отметка, совершённого действия'),
            'crud' => $this->string(10)->notNull()->comment('характер совершённого действия'),
            'activity_id' => $this->integer()->notNull()->comment('id в таблице базы данных в которой произведены изменения'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%activity}}');
    }
}
