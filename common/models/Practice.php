<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "practice".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 * @property string|null $date
 * @property int|null $type_id
 * @property string|null $video_url
 * @property string|null $image
 * @property string|null $file
 * @property int|null $number
 * @property int|null $views_count
 * @property int|null $download_count
 * @property int|null $status
 */
class Practice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'practice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['text'], 'string'],
            [['date'], 'safe'],
            [['type_id', 'number', 'views_count', 'download_count', 'status'], 'integer'],
            [['title', 'video_url', 'image', 'file'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => ['png', 'jpg', 'JPG', 'webp'], 'maxSize' => 2*(1024*1024)],
            [['file'], 'file', 'extensions' => ['pdf', 'html'], 'maxSize' => 5*(1024*1024)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'date' => 'Date',
            'type_id' => 'Type ID',
            'video_url' => 'Video Url',
            'image' => 'Image',
            'file' => 'File',
            'number' => 'Number',
            'views_count' => 'Views Count',
            'download_count' => 'Download Count',
            'status' => 'Status',
        ];
    }

    public function uploadImg($oldImage = null, $oldFile = null)
    {

        $this->image = UploadedFile::getInstance($this, 'image');
        if (isset($this->image)) {
            $this->image->saveAs('@frontend/web/practice/img/' .'image_'.time() . '.' . $this->image->extension);
            $this->image = 'image_'.time().'.'.$this->image->extension;
        }else{
            $this->image = $oldImage;
        }
        $this->file = UploadedFile::getInstance($this, 'file');
        if (isset($this->file)) {
            $this->file->saveAs('@frontend/web/practice/file/' . 'file_'.time() . '.' . $this->file->extension);
            $this->file = 'file_'.time().'.'.$this->file->extension;
        }
        else{
            $this->file = $oldFile;
        }
    }
}
