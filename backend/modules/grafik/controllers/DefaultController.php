<?php

namespace app\modules\grafik\controllers;

use yii\web\Controller;
use app\modules\grafik\models\Worktime;
use app\modules\clinic\models\Workers;
use app\modules\clinic\models\Departments;
use Yii;

/**
 * Default controller for the `grafik` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

    	if(Yii::$app->user->can('manager')){
        	//Получаем идентификатор клиники 
	    	$user_id = Yii::$app->user->id;

	    	$worker = Workers::find()->where(['user_id'=>$user_id])->one();
	    	$departments = Departments::find()->where(['manager_id'=>$worker['id']])->all();
	    	
	    	$workers = array();

	    	foreach ($departments as $department) {
	    		$employee = Workers::find()->where(['parent'=>$department['id']])->all();
	    		$workers[$department['id']] = $employee;
			}

	        return $this->render('index',[
	        	'departments' => $departments,
	        	'workers' => $workers,
	        ]);

        }
    	else{
    		return 'Не достаточно прав - вы не являетесь руководителем';
    	}

    }

    public function actionWorker()
    {
    	if(Yii::$app->user->can('manager')){
	    	if(Yii::$app->request->isGet){
	    		$query = Yii::$app->request->get();
	    		
	    		$worker = Workers::find()->where(['id'=>$query['id']])->one();

	    		$worktimes = Worktime::find()->where(['worker'=>$query['id']])->all();
	    		$worktimes_new = array();
	    		foreach($worktimes as $worktime){
	    			$day = date('d-m-Y', $worktime->day);
	    			$start = date('G-i', $worktime->start);
	    			$stop = date('G-i', $worktime->stop);
	    			$start_break = date('G-i', $worktime->start_break);
	    			$stop_break = date('G-i', $worktime->stop_break);
	    			$wt = [
	    				'day' => $day,
	    				'start' => $start,
	    				'stop' => $stop,
	    				'start_break' => $start_break,
	    				'stop_break' => $stop_break,
	    				'interval' => $worktime->interval,
	    			];
	    			$worktimes_new[] = $wt;
	    		}

	    		return $this->render('worker',[
	    			'worker' => $worker,
	    			'worktimes' => $worktimes_new,
	    		]);
	    	}
	    }
	    else{
    		return 'Не достаточно прав - вы не являетесь руководителем';
    	}

    }

    public function actionCreategrafik()
    {

    	if(Yii::$app->request->isGET){
	    	$query = Yii::$app->request->get();
	    		
	    	$worktime = new Worktime();

	    	$worktime->worker = $query['worker'];
	    	$worktime->day = $query['day'];
	    	$worktime->start = $query['start'];
	    	$worktime->stop = $query['stop'];
	    	$worktime->interval = $query['interval'];
	    	$worktime->start_break = $query['start_break'];
	    	$worktime->stop_break = $query['stop_break'];

	    	if($worktime->save()){
	    		return 'OK';
	    	}
	    	else{
	    		return 'False';
	    	}
	    		    	
	    }

    }

}
