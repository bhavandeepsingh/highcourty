<?php

namespace common\models;


/**
 * This is the model class for table "Banner".
 *
 * @property integer $id
 * @property string $url
 * @property integer $index
 * @property integer $status
 */
class Banners extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index', 'status'], 'required'],
            [['index', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'index' => 'Index',
            'status' => 'Status',
        ];
    }
    
    public function afterSave($insert, $changedAttributes) {
        UploadForm::uploadBannerProfilePic($this->id);
        parent::afterSave($insert, $changedAttributes);
    }
    
    public function getBannerPicSrc(){             
        return UploadForm::getBannerProfilePic($this->id);
    }
    
    
}
