<?php

use yii\db\Migration;

/**
 * Handles the creation of table `worktime`.
 */
class m170308_142832_create_worktime_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%worktime}}', [
            'id' => $this->primaryKey(),
            'worker' => $this->integer()->notNull()->comment('id сотрудника'),
            'day' => $this->integer()->notNull()->comment('таймстемп дня'),
            'start' => $this->integer()->notNull()->comment('Начало рабочего дня'),
            'stop' => $this->integer()->notNull()->comment('Конец рабочего дня'),
            'interval' => $this->integer()->notNull()->defaultValue(900)->comment('время приёма одного пациента'),
            'start_break' => $this->integer()->notNull()->comment('Таймстемп начала перерыва'),
            'stop_break' => $this->integer()->notNull()->comment('Таймстемп окончания перерыва'),
        ]);

        $this->addForeignKey(
            'fk-worktime-worker',
            '{{%worktime}}',
            'worker',
            '{{%workers}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%worktime}}');
    }
}
