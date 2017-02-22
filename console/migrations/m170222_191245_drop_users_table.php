<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `users`.
 */
class m170222_191245_drop_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('{{%users}}');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string()->notNull(),
        ]);
    }
}
