<?php

namespace backend\controllers;

use common\models\newsCatalog\Newses;
use common\models\newsCatalog\RubricNews;
use common\models\newsCatalog\Rubrics;
use yii\rest\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $newsData = [];
        $newses = Newses::find()->all();

        foreach ($newses as $news) {
            $newsData[] = [
                'id' => $news->id,
                'title' => $news->title,
                'content' => $news->content,
                'rubrics' => [
                    $news->getRubricsRest()
                ],
            ];
        }

        return $newsData;
    }

    public function actionView($id)
    {
        if (!$response = Newses::findOne($id)) {
            return [
                'message' => 'Новость не найдена',
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