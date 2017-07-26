<?php

namespace backend\models;

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
class ApplicationImage extends \common\models\ApplicationImage {

    public $imageFile;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['application_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['application_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload() {

        if ($this->validate()) {
            if ($this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension)) {
                $this->name = $this->imageFile->name;
                return TRUE;
            }
        }


        return FALSE;
    }

}
