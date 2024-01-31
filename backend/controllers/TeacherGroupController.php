<?php

namespace backend\controllers;

use common\models\forms\TeacherForm;
use common\models\search\TeacherGroupSearch;
use common\models\Teacher;
use common\models\TeacherGroup;
use yii\web\Controller;

class TeacherGroupController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new TeacherGroupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new TeacherGroup();
        $form = new TeacherGroup($model);

        if ($form->load($this->request->post()) && $form->validate() && $form->save()) {
            return $this->redirect(['teacher-group/index']);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $form,
        ]);
    }



}
