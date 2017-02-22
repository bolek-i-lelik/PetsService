<?php

use yii\db\Migration;

/**
 * Handles adding position to table `user`.
 */
class m170222_193609_add_position_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'parent_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
