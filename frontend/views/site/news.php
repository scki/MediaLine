<?php

/* @var $this yii\web\View */

use kartik\select2\Select2;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Каталог новостей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-news">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-md-6">
        <h2>Рубрики:</h2>

        <?php $form = ActiveForm::begin([
            'id' => 'rubric-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>

        <?php Modal::begin([
            'header' => '<h2>Добавить рубрику</h2>',
            'toggleButton' => ['label' => 'Добавить рубрику'],
            'footer' => Html::submitButton('Добавить    ', ['class' => 'btn btn-primary']),
        ]) ?>

        <div class="col-md-12">
            <?= $form->field($rubrics, 'name') ?>
            <?= $form->field($rubrics, 'id_parent')->widget(Select2::classname(), [
                'name' => 'rubrics',
                'data' => $allRubrics,
                'options' => [
                    'placeholder' => 'Выберите рубрику...',
                ],
            ]) ?>
        </div>

        <?php Modal::end(); ?>

        <?php ActiveForm::end() ?>

        <ul>
            <?php foreach ($allRubrics as $id => $rubric) { ?>
                <li><?= Html::encode('(' . $id . ') ' . $rubric) ?></li>
            <?php } ?>
        </ul>
    </div>

    <div class="col-md-6">
        <h2>Новости:</h2>

        <?php if (!$allRubrics) { ?>
            <p>Нет ниодной рубрики. Добавьте рубрику</p>
        <?php } else { ?>
            <?php $form = ActiveForm::begin([
            'id' => 'news-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>

            <?php Modal::begin([
            'header' => '<h2>Добавить Новость</h2>',
            'toggleButton' => ['label' => 'Добавить Новость'],
            'footer' => Html::submitButton('Добавить    ', ['class' => 'btn btn-primary']),
        ]) ?>

            <div class="col-md-12">
                <?= $form->field($newsForm, 'title') ?>
                <?= $form->field($newsForm, 'content') ?>

                <?= $form->field($newsForm, 'idRubric')->widget(Select2::classname(), [
                    'name' => 'rubrics',
                    'data' => $allRubrics,
                    'options' => [
                        'placeholder' => 'Выберите рубрику...',
                        'multiple' => true
                    ],
                ]) ?>
            </div>

            <?php Modal::end(); ?>

            <?php ActiveForm::end() ?>

        <?php } ?>

        <ul>
            <?php foreach ($allNewses as $news) { ?>
                <li style="margin-bottom: 5px"><?= Html::encode($news->title) ?>
                    <small>(рубрики: <?= $news->getRubrics() ?> )</small></li>
            <?php } ?>
        </ul>
    </div>


</div>
