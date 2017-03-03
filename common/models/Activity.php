<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property integer $id
 * @property integer $worker_id
 * @property string $db_table
 * @property string $timestamp
 * @property string $crud
 * @property integer $activity_id
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worker_id', 'db_table', 'crud', 'activity_id'], 'required'],
            [['worker_id', 'activity_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['db_table'], 'string', 'max' => 255],
            [['crud'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker_id' => 'Worker ID',
            'db_table' => 'Db Table',
            'timestamp' => 'Timestamp',
            'crud' => 'Crud',
            'activity_id' => 'Activity ID',
        ];
    }
}
