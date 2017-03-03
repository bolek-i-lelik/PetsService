<?php

use yii\db\Migration;

/**
 * Handles dropping timestamp from table `activity`.
 */
class m170303_205039_drop_timestamp_column_from_activity_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('{{%activity}}', 'timestamp');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
