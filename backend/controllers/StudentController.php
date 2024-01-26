<?php

namespace backend\controllers;

use common\models\AuthItem;
use common\models\Lids;
use common\models\search\LidsSearch;
use common\models\StudentGroup;
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
        $model = $this->findModel($id);

        $groups = StudentGroup::find()->where(['lids_id' => $model])->all();
        return $this->render('view', [
            'model' => $model,
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
    public function actionCreate(int $id): array|string
    {
        $ids = $this->findModel($id);
        $studentgroups = StudentGroup::find()->all();
        $model = new StudentGroup([
            'lids_id' => $ids->id,
        ]);
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $result['status'] = false;
            if ($model->load(Yii::$app->request->post())) {
                $isAssociationExists = false;

                foreach ($studentgroups as $studentgroup) {
                    if ($model->lids_id == $studentgroup->lids_id && $model->group_id == $studentgroup->group_id) {
                        $isAssociationExists = true;
                        break;
                    }
                }
                if (!$isAssociationExists) {
                    $model->save(false);
                    $result['status'] = true;
                    Yii::$app->session->setFlash('success');
                } else {
                    $result['status'] = false;
                    $result['error'] = 'Talaba bu guruhga allaqachon biriktirilgan';
                }

                return $result;
            }

            $result['content'] = $this->renderAjax('_form', ['model' => $model]);
            return $result;
        }

        return $this->render('view', [
            'model' => $model,
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