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
		
		$formatColumnName = function($name) {
			return '`' . $name . '`';
		};	
		
		$connection = Yii::$app->db;
		
		$schema = $connection->schema->tableNames;
		
		$tableSchemas = $connection->schema->tableSchemas;
		
		if(!empty($schema)) :
			
			$output = '';
			
			$output .= 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";';
			$output .= "\r\n";
			
			$output .= 'SET time_zone = "+00:00";';
			$output .= "\r\n";
			
			$output .= '/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;';
			$output .= "\r\n";
			
			$output .= '/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;';
			$output .= "\r\n";
			
			$output .= '/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;';
			$output .= "\r\n";
			
			$output .= '/*!40101 SET NAMES utf8 */;';
			$output .= "\r\n";
			
			foreach($tableSchemas as $tableSchema) :
				
				$autoIncrement = false;
				
				$output .= 'CREATE TABLE IF NOT EXISTS `' . $tableSchema->name . '` (';
				
				$columns = $tableSchema->columns;
				
				$arr = [];
				
				foreach($columns as $column) :
					
					
					$str = '';
					$str .= '`' . $column->name . '` ' . $column->dbType;
					
					if(!$column->allowNull) :
						$str .= ' NOT NULL';
					endif;
					
					if($column->autoIncrement) :
						$str .= ' AUTO_INCREMENT';
						$autoIncrement = true;
					endif;
					
					array_push($arr, $str);
					
				endforeach;
				
				if(!empty($tableSchema->primaryKey)) :
					array_push($arr, 'PRIMARY KEY (`' . $tableSchema->primaryKey[0] . '`)');
				endif;
				
				$output .= implode(',', $arr) . ') ENGINE=InnoDB  DEFAULT CHARSET=utf8';
				
				if($autoIncrement) :
					$output .= ' AUTO_INCREMENT=1';
				endif;
				
				$output .= ';';
				
				$output .= "\r\n";
				
				$tableData = $connection->createCommand('SELECT * FROM `' . $tableSchema->name . '`')->queryAll();
				
				if(!empty($tableData)) :
					
					$str = 'INSERT INTO `' . $tableSchema->name . '` (' . implode(',', array_map($formatColumnName, $tableSchema->columnNames)) . ') VALUES ';
					
					$values = [];
					
					foreach($tableData as $item) :
						
						$value = [];
						
						foreach($columns as $column) :
							
							if($column->phpType == 'integer') {
								array_push($value, (int)$item[$column->name]);
							} else {
								array_push($value, "'" . addslashes($item[$column->name]) . "'");
							}
							
						endforeach;
						
						array_push($values, '(' . implode(',', $value) . ')');
						
					endforeach;
					
					$str .= implode(',', $values) . ';';
					
					
					$output .= $str;
					$output .= "\r\n";
					
				endif;
				
				
			endforeach;
			
			$output .= '/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;';
			$output .= "\r\n";
			
			$output .= '/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;';
			$output .= "\r\n";
			
			$output .= '/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;';
			$output .= "\r\n";
			
			
				
			$file = fopen(Yii::$app->basePath . '/assets/db.sql', 'w');
			fwrite($file, $output);
			fclose($file);
			
			
			
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
