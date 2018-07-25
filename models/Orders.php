<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $name
 * @property string $img
 * @property string $text
 * @property int $date_from
 * @property int $date_to
 * @property int $status
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'date_to'], 'required','message'=>'Атрибут не указан'],
            [['status'], 'integer'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['img'], 'file', 'extensions' => 'jpg, png']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'img' => 'Изображение',
            'text' => 'Описание',
            'date_from' => 'Дата создания',
            'date_to' => 'Дата завершения',
            'status' => 'Статус',
        ];
    }
}
