<?php
namespace common\forms;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class NewsForm extends Model
{
    public $title;
    public $content;
    public $idRubric;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'idRubric'], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['idRubric'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'content' => 'Текст',
            'idRubric' => 'Рубрика',
        ];
    }

}
