<?php

use yii\db\Migration;

/**
 * Handles the creation of table `departments`.
 */
class m170222_190219_create_departments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%departments}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'adress' => $this->string()->notNull()->unique(),
            'phone' => $this->string()->notNull()->unique(),
            'email' => $this->string(),
            'manager_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->string()->notNull(),
        ]);

        // creates index for column `parent_id` in table departments
        $this->createIndex(
            'idx-departmets-parent_id',
            '{{%departments}}',
            'parent_id'
        );

        // add foreign key for table `clinic`
        $this->addForeignKey(
            'fk-departments-parent_id',
            '{{%departments}}',
            'parent_id',
            '{{%clinic}}',
            'id',
            'CASCADE'
        ); 

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
        $this->dropTable('{{%departments}}');
    }
}
