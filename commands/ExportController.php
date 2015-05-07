<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ExportController extends Controller {
	
    public function actionIndex() {
        
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
}
