<?php

use yii\db\Migration;

/**
 * Handles adding position to table `user`.
 */
class m170224_184739_add_position_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'role', $this->string()->comment('Роль в системе'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
    }
}
