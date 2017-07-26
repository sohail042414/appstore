<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%application_image}}".
 *
 * @property integer $id
 * @property integer $application_id
 * @property string $name
 * @property string $type
 *
 * @property Application $application
 */
class ApplicationImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%application_image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['application_id', 'name'], 'required'],
            [['application_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['application_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'application_id' => 'Application ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Application::className(), ['id' => 'application_id']);
    }
}
