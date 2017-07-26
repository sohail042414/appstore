<?php

namespace backend\models;

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
class Application extends \common\models\Application {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'playstore_url',], 'required'],
            [['description', 'playstore_url'], 'string'],
            [['version'], 'number'],
            [['user_id', 'special', 'featured', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'Application Id',
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

}
