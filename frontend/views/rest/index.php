<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Демонстрация работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <?= Html::a('Все новости', ['news'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Новость по ID', ['news-view'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Новость с ошибочным ID', ['news-error'], ['class' => 'btn btn-default']) ?>
    <br>
    <br>
    <?= Html::a('Все рубрики', ['rubrics'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Дочерние Рубрики', ['rubric-view', 'idRubric' => 3], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Рубрика с ошибочным ID', ['rubric-error'], ['class' => 'btn btn-default']) ?>
</div>
