<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Демонстрация работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <p><?= Html::a('Назад', ['index'], ['class' => 'btn btn-default']) ?></p>


    <p>Ответ на запрос <code>GET <?= $url ?></code>:</p>
    <pre><?php echo json_decode(json_encode($response), true); ?></pre>

    <p>Подробнее</p>
    <pre><?php print_r(json_decode($response, JSON_PRETTY_PRINT)) ?></pre>
</div>
