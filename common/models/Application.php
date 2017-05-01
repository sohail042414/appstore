<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%application}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $playstore_url
 * @property double $version
 * @property integer $user_id
 * @property integer $special
 * @property integer $featured
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 * @property ApplicationCategory[] $applicationCategories
 * @property Category[] $categories
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%application}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'playstore_url' => 'Playstore Url',
            'version' => 'Version',
            'user_id' => 'User ID',
            'special' => 'Special',
            'featured' => 'Featured',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicationCategories()
    {
        return $this->hasMany(ApplicationCategory::className(), ['application_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('{{%application_category}}', ['application_id' => 'id']);
    }
}
