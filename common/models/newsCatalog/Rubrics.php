<?php

namespace common\models\newsCatalog;

use Yii;

/**
 * This is the model class for table "{{%rubrics}}".
 *
 * @property int $id
 * @property int|null $id_parent
 * @property string|null $name
 *
 * @property RubricNews[] $rubricNews
 * @property Rubrics $parent
 * @property Rubrics[] $rubrics
 */
class Rubrics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rubrics}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parent'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Rubrics::className(), 'targetAttribute' => ['id_parent' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent' => 'Id Parent',
            'name' => 'Название рубрики',
        ];
    }

    /**
     * Gets query for [[RubricNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubricNews()
    {
        return $this->hasMany(RubricNews::className(), ['id_rubric' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Rubrics::className(), ['id' => 'id_parent']);
    }

    /**
     * Gets query for [[Rubrics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubrics()
    {
        return $this->hasMany(Rubrics::className(), ['id_parent' => 'id']);
    }

    public static function getAllChildId($idParentRubric,  array $rubrics = [])
    {
        $rubric = self::findOne($idParentRubric);
        array_push($rubrics, $rubric->id);

        $childRubrics = self::findAll(['id_parent' => $idParentRubric]);
        foreach ($childRubrics as $childRubric) {
            $rubrics = self::getAllChildId($childRubric->id, $rubrics);
        }

        return $rubrics;
    }

    public static function getAllChild($idParentRubric,  array $rubrics = [])
    {
        $rubric = self::findOne($idParentRubric);
        array_push($rubrics, $rubric->name);

        $childRubrics = self::findAll(['id_parent' => $idParentRubric]);
        foreach ($childRubrics as $childRubric) {
            $rubrics = self::getAllChild($childRubric->id, $rubrics);
        }

        return $rubrics;
    }
}
