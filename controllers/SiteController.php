<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

class SiteController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
	
	public function actionExport() {
		
		$connection = Yii::$app->db;
		
		$schema = $connection->schema->tableNames;
		
		if(!empty($schema)) :
			
			foreach($schema as $tableName) :
				
				$tableData = $connection->createCommand('SELECT * FROM `' . $tableName . '`')->queryAll();
				
				if(!empty($tableData)) :
					
					$output = '';
					
					$tableKeys = array_keys($tableData[0]);
					$arr = [];
					
					foreach($tableKeys as $key) :
						array_push($arr, '"' . $key . '"');
					endforeach;
					
					$output .= implode(',', $arr);
					$output .= "\r\n";
					
					foreach($tableData as $item) :
						$arr = [];
						
						foreach($tableKeys as $key) :
							array_push($arr, '"' . $item[$key] . '"');
						endforeach;
							
						$output .= implode(',', $arr);
						$output .= "\r\n";
						
					endforeach;
					
					$file = fopen(Yii::$app->basePath . '/assets/' . $tableName . '.csv', 'w');
					fwrite($file, $output);
					fclose($file);
					
				endif;
				
			endforeach;
			
		endif;
		
	}

    public function actionLogin()
    {
		if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $this->layout = 'login';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
