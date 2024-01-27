<?php

namespace backend\controllers;

use common\models\Course;
use common\models\forms\CourseForm;
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
     * @return string|Response
     */
    public function actionIndex()
    {
        $query = Course::find()->all();
        $model = new Course();
        $form = new CourseForm($model);

        if ($form->load($this->request->post()) && $form->validate() && $form->save()) {
            return $this->redirect(['course/index']);
        }

        return $this->render('index', [
            'query' => $query,
            'model' => $form,
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
          return $this->form($model, 'update');
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
        return $this->form($model, 'update');
    }


    public function form(Course $model, $view)
    {
        $form = new CourseForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
            Yii::$app->session->setFlash('success');
            return $this->redirect(['course/index']);
        }
        return $this->renderAjax('_form', [
            'model' => $form,
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
