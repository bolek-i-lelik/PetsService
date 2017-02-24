<?php

use yii\db\Migration;

/**
 * Handles adding position to table `user`.
 */
class m170224_192012_add_position_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'role', $this->string()->defaultValue('clinic')->comment('Роль'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
    }
}
