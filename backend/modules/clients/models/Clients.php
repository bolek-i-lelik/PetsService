<?php

namespace app\modules\clients\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property integer $id
 * @property integer $clinic_id
 * @property string $familia
 * @property string $name
 * @property string $father
 * @property string $passport
 * @property string $adress
 * @property string $pets_name
 * @property string $phone
 * @property string $email
 * @property string $pets_social_account
 * @property string $chip
 * @property string $vid
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%clients}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clinic_id', 'familia', 'name', 'phone'], 'required'],
            [['clinic_id'], 'integer'],
            [['familia', 'name', 'father', 'passport', 'adress', 'pets_name', 'phone', 'email', 'pets_social_account', 'chip', 'vid'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clinic_id' => 'Clinic ID',
            'familia' => 'Familia',
            'name' => 'Name',
            'father' => 'Father',
            'passport' => 'Passport',
            'adress' => 'Adress',
            'pets_name' => 'Pets Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'pets_social_account' => 'Pets Social Account',
            'chip' => 'Chip',
            'vid' => 'Vid',
        ];
    }
}
