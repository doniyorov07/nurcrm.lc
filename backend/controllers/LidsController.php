<?php

namespace backend\controllers;

use common\models\forms\LidsForm;
use common\models\Lids;
use common\models\search\LidsSearch;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LidsController implements the CRUD actions for Lids model.
 */
class LidsController extends Controller
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
     * Lists all Lids models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LidsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lids model.
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
     * Creates a new Lids model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Controller
     */

    public function actionCreate()
    {
        return $this->form(
            new Lids()
        );
    }


    /**
     * Updates an existing Lids model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        return $this->form(
            $this->findModel($id)
        );
    }


    /**
     * @throws Exception
     */
    protected function form(Lids $model)
    {
        $formModel = new LidsForm($model);
        if ($formModel->load(Yii::$app->request->post()) && $formModel->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('_form', [
            'model' => $formModel,
        ]);
    }


    /**
     * Deletes an existing Lids model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lids model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Lids the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lids::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
