<?php

namespace common\models\newsCatalog;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "{{%newses}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 *
 * @property RubricNews[] $rubricNews
 */
class Newses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%newses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'content' => 'Текст',
        ];
    }

    /**
     * Gets query for [[RubricNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubricNews()
    {
        return $this->hasMany(RubricNews::className(), ['id_news' => 'id']);
    }

    public function getRubrics()
    {
        $rubricNewses = $this->rubricNews;
        $rubric = '';

        foreach ($rubricNewses as $rubricNews) {
            $rubric .= '<rubric>' . Html::encode($rubricNews->rubric->name) . '</rubric>';
        }

        return $rubric;
    }

    public function getRubricsRest()
    {
        $rubricNewses = $this->rubricNews;
        $rubric = [];

        foreach ($rubricNewses as $rubricNews) {
            $rubric[$rubricNews->rubric->id] = Html::encode($rubricNews->rubric->name);
        }

        return $rubric;
    }
}
