<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Users;
use app\modules\admin\models\search\Users as UsersSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $queryParams = Yii::$app->request->getQueryParams();

        $naam = Yii::$app->request->post('naam', null);
        $surname = Yii::$app->request->post('surname', null);

        if (!isset($queryParams['Users'])) {
            $queryParams['Users'] = array('disabled' => 0);
        }

        $queryParams['Users']['naam'] = $naam;
        $queryParams['Users']['surname'] = $surname;

        $searchModel = new UsersSearch;
        $dataProvider = $searchModel->search($queryParams);

        if (!$queryParams['Users'] || $queryParams['Users']['disabled'] == 0) {
            $onDisabledTab = false;
        } else {
            $onDisabledTab = true;
        }

        return $this->render('index', [
            'dataProvider'  => $dataProvider,
            'searchModel'   => $searchModel,
            'onDisabledTab' => $onDisabledTab,
        ]);
    }

    /**
     * Activate current user or set disabled to 0
     */
    public function actionActivate($id)
    {
        $user = Users::findOne($id);
        $user->disabled = 0;
        $user->save();

        return $this->redirect(['index', 'Users[disabled]' => '0']);
    }

    /**
     * Deactivate user or set disabled to 1
     */
    public function actionDeactivate($id)
    {
        $user = Users::findOne($id);
        $user->disabled = 1;
        $user->save();

        return $this->redirect(['index', 'Users[disabled]' => '1']);
    }

    /**
     * Displays a single Users model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $existUser = Users::findOne(['naam' => $model->naam, 'disabled' => 0]);
            if ($existUser) {
                $existUser->disabled = 1;
                $existUser->save();
                return $this->render('warning', ['naam' => $model->naam]);

            } else {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
