<?php

namespace backend\controllers;

use common\models\forms\TeacherForm;
use common\models\forms\TeacherGroupForm;
use common\models\search\TeacherGroupSearch;
use common\models\Teacher;
use common\models\TeacherGroup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TeacherGroupController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new TeacherGroupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new TeacherGroup();
        $form = new TeacherGroupForm($model);

        if ($form->load($this->request->post()) && $form->validate() && $form->save()) {
            return $this->redirect(['teacher-group/index']);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $form,
        ]);
    }

    public function actionCreate()
    {
        $model = new TeacherGroup();
        return $this->form($model, 'update');
    }

    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }



    public function form(TeacherGroup $model, $view)
    {
        $form = new TeacherGroupForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
            \Yii::$app->session->setFlash('success');
            return $this->redirect(['teacher-group/index']);
        }

        return $this->renderAjax('_form', [
            'model' => $form,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = TeacherGroup::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
