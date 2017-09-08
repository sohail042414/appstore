<?php

namespace backend\models;

use Yii;
use yii\helpers\Url;

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
            [['imageFile'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'png, jpg,jpeg'],
        ];
    }

    public function upload() {

        if ($this->validate()) {

            if (!is_object($this->imageFile)) {
                $this->addError('imageFile', 'Please select and image!');
                return FALSE;
            }

            $newName = 'app-' . $this->application_id . '-' . time() . '-image.' . $this->imageFile->extension;

            if ($this->imageFile->saveAs(Url::to('@frontend/web/uploads/') . $newName)) {
                $this->name = $newName;
                return TRUE;
            }
        }

        return FALSE;
    }

    public function removeFile() {
        @unlink(Url::to('@frontend/web/uploads/') . $this->name);
    }

}
