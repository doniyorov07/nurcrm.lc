<?php

namespace backend\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;

class ReceptionController extends Controller
{

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



    public function actionIndex(): string
    {
        return $this->render('index');
    }

}