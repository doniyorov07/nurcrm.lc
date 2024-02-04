<?php

namespace backend\controllers;

use common\models\AuthItem;
use common\models\forms\PaymentForm;
use common\models\forms\StudentGroupForm;
use common\models\forms\TeacherForm;
use common\models\Lids;
use common\models\Payment;
use common\models\search\LidsSearch;
use common\models\StudentGroup;
use common\models\Teacher;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class StudentController extends Controller
{

    public function behaviors(): array
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
    public function actionIndex(): string
    {
        $searchModel = new LidsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $models = $this->findModel($id);

        $groups = StudentGroup::find()->where(['lids_id' => $models->id])->all();

        $model = new StudentGroup();
        $form = new StudentGroupForm($model);

        if ($form->load($this->request->post()) && $form->validate() && $form->save()) {
            return $this->redirect(['student/view', 'id' => $models->id]);
        }

        $payment = new Payment();
        $payform= new PaymentForm($payment);

        if ($payform->load($this->request->post()) && $payform->validate() && $payform->save()) {
            return $this->redirect(['student/view', 'id' => $models->id]);
        }

        return $this->render('view', [
            'model' => $model,
            'payment' => $payment,
            'models' => $models,
            'groups' => $groups,
        ]);
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @throws NotFoundHttpException
     */

    public function actionPayment()
    {
        $payment = new Payment();
        return $this->formp($payment, 'payupdate');
    }


    public function formp(Payment $payment, $view)
    {
        $form = new PaymentForm($payment);
        if ($form->load($this->request->post()) && $form->save()) {
            \Yii::$app->session->setFlash('success');
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('_payform', [
            'payment' => $form,
        ]);
    }


    public function actionCreate()
    {
        $model = new StudentGroup();
        return $this->form($model, 'update');
    }

    public function form(StudentGroup $model, $view)
    {
        $form = new StudentGroupForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
            \Yii::$app->session->setFlash('success');
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('_form', [
            'model' => $form,
        ]);
    }





    protected function findModel(int $id): Lids
    {
        if (($model = Lids::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}