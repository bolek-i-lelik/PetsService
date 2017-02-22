<?php

use yii\db\Migration;

/**
 * Handles adding position to table `workers`.
 */
class m170222_202222_add_position_column_to_workers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%workers}}', 'position', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
