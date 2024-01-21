<?php

namespace backend\controllers;

use common\models\AuthItem;
use common\models\Course;
use common\models\search\Course as CourseSearch;
use lavrentiev\widgets\toastr\NotificationFlash;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
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
     * Lists all Course models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Course::find()->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|string
     */

    public function actionCreate()
    {
        $model = new Course();
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {
            $result['status'] = false;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $result['status'] = true;
                Yii::$app->session->setFlash('success');
            }
            $result['content'] = $this->renderAjax('_form', ['model' => $model]);
            return $result;
        }

        if (Yii::$app->request->isAjax) {
            $result['content'] = $this->renderAjax('_form', ['model' => $model]);
            return $result;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return array|string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {
            $result['status'] = false;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $result['status'] = true;
                Yii::$app->session->setFlash('success');
            }
            $result['content'] = $this->renderAjax('_form', ['model' => $model]);
            return $result;
        }

        if (Yii::$app->request->isAjax) {
            $result['content'] = $this->renderAjax('_form', ['model' => $model]);
            return $result;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Course
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
