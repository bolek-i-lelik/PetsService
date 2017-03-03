<?php

use yii\db\Migration;

/**
 * Handles adding timestamp to table `activity`.
 */
class m170303_204821_add_timestamp_column_to_activity_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%activity}}', 'timestamp', $this->dateTime());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
