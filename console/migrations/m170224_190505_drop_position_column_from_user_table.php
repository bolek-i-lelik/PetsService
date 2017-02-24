<?php

use yii\db\Migration;

/**
 * Handles dropping position from table `user`.
 */
class m170224_190505_drop_position_column_from_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('user', 'role');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('user', 'role', $this->string());
    }
}
