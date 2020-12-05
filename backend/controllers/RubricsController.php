<?php

namespace backend\controllers;

use common\models\newsCatalog\Newses;
use common\models\newsCatalog\RubricNews;
use common\models\newsCatalog\Rubrics;
use yii\rest\Controller;

class RubricsController extends Controller
{
    public function actionIndex($idRubric = null)
    {
        if ($idRubric === null) {
            return Rubrics::find()->all();
        }

        $rubricIds = Rubrics::getAllChildId($idRubric);
        $rubricsNewses = RubricNews::getNewsIdsByRubricIds($rubricIds);

        if (!$response = Newses::findAll($rubricsNewses)) {
            return [
                'message' => 'Новостей с данной рубрикой не найдено',
            ];
        }

        return $response;
    }

    public function actionView($id)
    {
        if (!$response = Rubrics::getAllChild($id)) {
            return [
                'message' => 'Рубрик не найдено',
            ];
        }
        return $response;
    }

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
        ];
    }
}