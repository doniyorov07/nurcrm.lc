<?php

namespace backend\modules\profilemanager\controllers;

use backend\controllers\FilterController;
use backend\modules\profilemanager\models\ChangePasswordForm;
use backend\modules\profilemanager\models\ProfileUser;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `profilemanager` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChangeLogin()
    {
        $model = ProfileUser::getUserModel();

        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'Sahifa mavjud emas!'));
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Login muvaffaqqiyatli o\'zgartirildi!'));
            return $this->redirect(['index']);
        }
        return $this->render('changeLogin', ['model' => $model]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */

    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();

        $id = Yii::$app->request->get('id');

        if ($model->load(Yii::$app->request->post()) && $model->savePassword($id)) {

            Yii::$app->session->setFlash('success', Yii::t('app', 'Parol muvaffaqqiyatli o\'zgartirildi!'));
            return $this->redirect(['index']);

        }
        return $this->render('changePassword', ['model' => $model]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
