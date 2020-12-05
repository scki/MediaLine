<?php

namespace common\models\newsCatalog;

use Yii;

/**
 * This is the model class for table "{{%rubric_news}}".
 *
 * @property int $id
 * @property int|null $id_news
 * @property int|null $id_rubric
 *
 * @property Rubrics $rubric
 * @property Newses $news
 */
class RubricNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rubric_news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_news', 'id_rubric'], 'integer'],
            [['id_rubric'], 'exist', 'skipOnError' => true, 'targetClass' => Rubrics::className(), 'targetAttribute' => ['id_rubric' => 'id']],
            [['id_news'], 'exist', 'skipOnError' => true, 'targetClass' => Newses::className(), 'targetAttribute' => ['id_news' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_news' => 'Id News',
            'id_rubric' => 'Id Rubric',
        ];
    }

    /**
     * Gets query for [[Rubric]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubric()
    {
        return $this->hasOne(Rubrics::className(), ['id' => 'id_rubric']);
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(Newses::className(), ['id' => 'id_news']);
    }

    public static function getNewsIdsByRubricIds(array $idRubrics)
    {
        $newsIds = [];
        $rubricsNewses = self::find()
            ->select('id_news')
            ->where(['id_rubric' => $idRubrics])
            ->asArray()
            ->all();

        foreach ($rubricsNewses as $rubricsNews) {
            $newsIds[] = $rubricsNews['id_news'];
        }

        return $newsIds;
    }
}
