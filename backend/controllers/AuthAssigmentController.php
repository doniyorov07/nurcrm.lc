<?php

namespace backend\controllers;

use common\models\AuthAssignment;
use common\models\AuthItem;
use common\models\search\AuthAssigmentSearch;
use lavrentiev\widgets\toastr\NotificationFlash;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * AuthAssigmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssigmentController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AuthAssignment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AuthAssigmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name Item Name
     * @param string $user_id User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionView($item_name, $user_id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($item_name, $user_id),
//        ]);
//    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
       public function actionCreate()
    {
        $model = new AuthAssignment();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $result['status'] = false;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash(NotificationFlash::TYPE_SUCCESS, [
                    'title' => 'The Internet?',
                    'text' => 'That thing is still around?',
                ]);
                $result['status'] = true;
                return $result;
            }
            $result['content'] = $this->renderAjax('_form', ['model' => $model]);
            return $result;
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name Item Name
     * @param string $user_id User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item_name, $user_id)
    {
        $model = $this->findModel($item_name, $user_id);

        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {
            $result['status'] = false;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $result['status'] = true;
                return $result;
            }
            $result['content'] = $this->renderAjax('_form', ['model' => $model]);
            return $result;
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name Item Name
     * @param string $user_id User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($item_name, $user_id)
    {
        $this->findModel($item_name, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name Item Name
     * @param string $user_id User ID
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
