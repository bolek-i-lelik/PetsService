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
    		return $this->redirect('/site/index');
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
	    				'id' => $worktime->id,
	    				'day' => $day,
	    				'start' => $start,
	    				'stop' => $stop,
	    				'start_break' => $start_break,
	    				'stop_break' => $stop_break,
	    				'interval' => $worktime->interval,
	    				'date' => date('Y-m-d', $worktime->day),
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
    		return $this->redirect('/site/index');
    	}

    }

    public function actionCreategrafik()
    {

    	if(Yii::$app->request->isAJAX){
	    	$query = Yii::$app->request->post();
	    		
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

    public function actionFiltergrafik()
    {

    	if(Yii::$app->request->isGET){
	    	$query = Yii::$app->request->get();
	    		
	    	/*$worker = $query['worker'];
	    	$start = $query['start'];
	    	$stop = $query['stop']+86400;

	    	$worktimes = Worktime::find()->where(['worker' => $worker])->andWhere(['>=', 'day', $start])->andWhere(['<', 'day', $stop])->all();
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
	    	$worktimes_new = json_encode($worktimes_new);

	    	return $worktimes_new;	*/ 

	    		$worker = $query['worker'];

	    		$worker = Workers::find()->where(['id'=>$query['worker']])->one();

	    		$start = $query['start'];
	    		$stop = $query['stop']+86400;

	    		$worktimes = Worktime::find()->where(['worker' => $worker])->andWhere(['>=', 'day', $start])->andWhere(['<', 'day', $stop])->all();
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
	    				'date' => date('Y-m-d', $worktime->day),
	    			];
	    			$worktimes_new[] = $wt;
	    		}

	    		return $this->render('worker',[
	    			'worker' => $worker,
	    			'worktimes' => $worktimes_new,
	    		]);   	
	    		    	
	    }

    }

    public function actionUpdategrafik()
    {

    	if(Yii::$app->request->isGET){
	    	$query = Yii::$app->request->get();
	    		
	    	$worker = $query['worker'];
	    	
	    	$worktime = Worktime::find()->where(['day' => $query['day']])->andWhere(['worker' => $worker])->one();

	    	$worktime->start = $query['start'];
	    	$worktime->stop = $query['stop'];
	    	$worktime->start_break = $query['start_break'];
	    	$worktime->stop_break = $query['stop_break'];
	    	if(!empty($query['interval'])){
	    		$worktime->interval = $query['interval'];
	    	}
	    	$worktime->save();

	    	return true;	    	
	    		    	
	    }

    }

}
