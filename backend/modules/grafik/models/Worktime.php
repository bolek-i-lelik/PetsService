<?php

namespace app\modules\grafik\models;

use Yii;
use app\modules\clinic\models\Workers;

/**
 * This is the model class for table "worktime".
 *
 * @property integer $id
 * @property integer $worker
 * @property integer $day
 * @property integer $start
 * @property integer $stop
 * @property integer $interval
 * @property integer $start_break
 * @property integer $stop_break
 *
 * @property Workers $worker
 */
class Worktime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%worktime}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worker', 'day', 'start', 'stop', 'start_break', 'stop_break'], 'required'],
            [['worker', 'day', 'start', 'stop', 'interval', 'start_break', 'stop_break'], 'integer'],
            [['day'], 'unique'],
            [['worker'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['worker' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker' => 'Worker',
            'day' => 'Day',
            'start' => 'Start',
            'stop' => 'Stop',
            'interval' => 'Interval',
            'start_break' => 'Start Break',
            'stop_break' => 'Stop Break',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Workers::className(), ['id' => 'worker']);
    }

}
