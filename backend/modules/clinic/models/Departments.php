<?php

namespace app\modules\clinic\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $adress
 * @property string $phone
 * @property string $email
 * @property integer $manager_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Workers $manager
 * @property Clinic $parent
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%departments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'adress', 'phone'], 'required'],
            [['parent_id', 'manager_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'adress', 'phone', 'email'], 'string', 'max' => 255],
            /*[['name'], 'unique'],
            [['adress'], 'unique'],
            [['phone'], 'unique'],*/
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['manager_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clinic::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'adress' => 'Adress',
            'phone' => 'Phone',
            'email' => 'Email',
            'manager_id' => 'Manager ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Workers::className(), ['id' => 'manager_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Clinic::className(), ['id' => 'parent_id']);
    }
}
