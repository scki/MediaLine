<?php

namespace frontend\controllers;

use common\forms\NewsForm;
use common\models\newsCatalog\Newses;
use common\models\newsCatalog\RubricNews;
use common\models\newsCatalog\Rubrics;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class RestController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionNews()
    {
        $url = Yii::$app->urlManager->createAbsoluteUrl('admin/news');
        $response = $this->sendRequest($url);

        return $this->render('response', [
            'url' => $url,
            'response' => $response,
        ]);
    }

    public function actionRubrics()
    {
        $url = Yii::$app->urlManager->createAbsoluteUrl('admin/rubrics');
        $response = $this->sendRequest($url);

        return $this->render('response', [
            'url' => $url,
            'response' => $response,
        ]);
    }

    public function actionNewsView()
    {
        $url = Yii::$app->urlManager->createAbsoluteUrl('admin/news/2');
        $response = $this->sendRequest($url);

        return $this->render('response', [
            'url' => $url,
            'response' => $response,
        ]);
    }

    public function actionRubricView($idRubric)
    {
        $url = Yii::$app->urlManager->createAbsoluteUrl('admin/rubrics?idRubric=' . $idRubric);

        $response = $this->sendRequest($url);

        return $this->render('response', [
            'url' => $url,
            'response' => $response,
        ]);
    }

    public function actionNewsError()
    {
        $url = Yii::$app->urlManager->createAbsoluteUrl('admin/news/200');
        $response = $this->sendRequest($url);

        return $this->render('response', [
            'url' => $url,
            'response' => $response,
        ]);
    }

    public function actionRubricError()
    {
        $url = Yii::$app->urlManager->createAbsoluteUrl('admin/rubrics?idRubric=300');
        $response = $this->sendRequest($url);

        return $this->render('response', [
            'url' => $url,
            'response' => $response,
        ]);
    }

    /**
     * @return bool|string
     */
    public function sendRequest($url)
    {
        $myCurl = curl_init();
        curl_setopt_array($myCurl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => false,
        ));
        curl_setopt($myCurl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        $response = curl_exec($myCurl);
        curl_close($myCurl);
        return $response;
    }
}
