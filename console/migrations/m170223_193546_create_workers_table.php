<?php

use yii\db\Migration;

/**
 * Handles the creation of table `workers`.
 */
class m170223_193546_create_workers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // creates index for column `manager_id` in table departments
        $this->createIndex(
            'idx-departmets-manager_id',
            '{{%departments}}',
            'manager_id'
        );

        // add foreign key for table `workers`
        $this->addForeignKey(
            'fk-departments-manager_id',
            '{{%departments}}',
            'manager_id',
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
        $this->dropTable('workers');
    }
}
