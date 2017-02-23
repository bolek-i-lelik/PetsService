<?php

use yii\db\Migration;

/**
 * Handles the creation of table `workers`.
 */
class m170223_192120_create_workers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // drops foreign key for table `user`
        
        // drops index for column `author_id`
        $this->dropIndex(
            'idx-departmets-manager_id',
            '{{%departments}}'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        
    }
}
