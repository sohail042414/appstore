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
            /*
              [['type'], 'unique', 'message' => '{value} already exists, delete it to upload again!', 'when' => function() {
              return ($this->type == 'normal') ? FALSE : TRUE;
              }
              ],
             * 
             */
            [['application_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => Application::className(), 'targetAttribute' => ['application_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload() {

        if ($this->validate()) {

            if (!is_object($this->imageFile)) {
                $this->addError('imageFile', 'Please select and image!');
                return FALSE;
            }

            if ($this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension)) {
                $this->name = $this->imageFile->name;
                return TRUE;
            }
        }

        return FALSE;
    }

}
