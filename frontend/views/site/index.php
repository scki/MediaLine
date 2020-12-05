<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Тестовое задание';
?>
<div class="site-index">

    <div class="col-md-7">
        <h3><?= $this->title ?></h3>

        <p>Необходимо создать упрощенную версию новостного каталога.
            Пункты отмеченные курсивом являются не обязательными для выполнения, но их выполнение будет плюсом.</p>

        <p>Наш каталог будет содержать 2 вида объектов:</p>
        <ul>
            <li>Новость</li>
            <li>Рубрика</li>
        </ul>
        <hr>

        <p><b>Новость</b></p>
        <p>Представляет собой объект новости и должен содержать следующую информацию:</p>
        <ul>
            <li>Заголовок</li>
            <li>Текст</li>
            <li>Может относиться к нескольким рубрикам</li>
        </ul>
        <hr>

        <p><b>Рубрика</b></p>
        <p>Рубрики позволяют классифицировать новостные материалы в каталоге. Имеют название и могут в древовидном виде
            вкладываться друг в друга. В простом случае реализации уровень вложенности будет 2-3 рубрики, в сложном -
            произвольный. Вот пример возможных рубрик и их иерархии:</p>
        <ul>
            <li>Общество</li>
            <ul>
                <li>городская жизнь</li>
                <li>выборы</li>
            </ul>
            <li>День города</li>
            <ul>
                <li>салюты</li>
                <li>детская площадка</li>
            </ul>
            <li>0-3 года</li>
            <li>3-7 года</li>
            <li>Спорт</li>
        </ul>
        <hr>

        <p><b>Функции каталога</b></p>
        <p>Взаимодействие с пользователем происходит посредством HTTP запросов к API серверу. Все ответы представляют
            собой
            JSON объекты. Сервер реализует следующие методы:</p>
        <ul>
            <li>выдача списка всех новостей, которые относятся к указанной рубрике, включая дочерние</li>
            <p>Дополнительное задание (необязательно):</p>
            <li>выдача списка всех рубрик, с дочерними, с учетом произвольного уровня вложенности</li>
        </ul>
        <hr>

        <p><b>Задание</b></p>
        <p>Формат маршрутов для доступа к методам, а также формат ответа и запросов мы предоставляем Вам реализовать и
            выбрать самим.</p>
        <ul>
            <li>Спроектировать базу данных и развернуть ее при помощи миграций</li>
            <li>Выполнить конфигурацию веб-сервера (любого)</li>
            <li>Реализовать API согласно ТЗ</li>
            <li>Опубликовать/развернуть приложение, предоставить нам ссылки по которым можно протестировать работу
                сервиса:
                выложить работающее приложение на любой хостинг, а код на публичный репозиторий.
            </li>
        </ul>

        <p>Если у Вас есть желание продемонстрировать знание какой-то технологии или подхода, то можно реализовать
            произвольную
            дополнительную функциональность на Ваше усмотрение.</p>
        <hr>

        <b>Используемые технологии:</b>
        <p>При выполнении задания требуется использовать следующие технологии:</p>
        <ul>
            <li>язык программирования PHP</li>
            <li>для реализации использовать фреймворк Yii2</li>
            <li>система контроля версий - Git</li>
            <li>база данных MongoDB или Mysql</li>
        </ul>
    </div>

    <div class="col-md-5">
        <h3>Заполнение данных</h3>
        <p>На странице <?= Html::a('Новости', ['news']) ?> можно добавить данные (рубрики и новости), а так же там есть
            предварительный просомтр</p>

        <hr>
        <h3>Проверка работы</h3>
        <p>Для проверки работы используйте следующие запросы:</p>

        <ul>
            <li><code>GET /news/</code>: список всех новостей со списком рубрик</li>
            <li><code>GET /news/$id</code>: вывод новости по заданной рубрике</li>
            <li>
                <code>GET /rubric?$idRubric</code>: вывод всех рубрик.
                Если задан параметр <code>$idRubric</code>, то выводит рубрику с этим ID и все дочерние рубрики
            </li>
            <li><code>GET /rubric/$id</code>: вывод рубрики</li>
        </ul>

        <p>На странице <?= Html::a('REST', ['/rest/index']) ?> можно посмотреть пример работы запросов.</p>
    </div>
</div>