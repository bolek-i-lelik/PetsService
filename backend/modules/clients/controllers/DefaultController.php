<?php

namespace app\modules\clients\controllers;

use Yii;
use yii\web\Controller;
use common\models\Activity;
use app\modules\clinic\models\Workers;
use app\modules\clients\models\Clients;

/**
 * Default controller for the `clients` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	var_dump(Yii::$app->user->id); exit();

        return $this->render('index');
    }

    public function actionNew()
    {

    	$worker = Workers::find()->where(['user_id'=>Yii::$app->user->id])->one();

    	return $this->render('new',[
    		'worker' => $worker,
    	]);
    }

    public function actionCreateclients()
    {

    	if(Yii::$app->request->isAJAX ){
            $query = Yii::$app->request->post();

            $client = new Clients();

            $client->clinic_id = $query['clinic_id'];
            $client->name = $query['name'];
            $client->familia = $query['familie'];
            $client->father = $query['father'];
            $client->passport = $query['passport'];
            $client->adress = $query['adress'];
            $client->pets_name = $query['pets_name'];
            $client->phone = $query['phone'];
            $client->email = $query['email'];
            $client->pets_social_account = $query['social_account'];
            $client->chip = $query['chip'];
            $client->vid = $query['vid'];
            if($client->save()){
            	$worker = Workers::find()->where(['user_id'=>Yii::$app->user->id])->one();
            	$client = Clients::find()->where(['passport'=>$query['passport']])->one();
            	$activity = new Activity();
            	$activity->worker_id = $worker['id'];
            	$activity->db_table = 'clients';
            	$activity->crud = 'create';
            	$activity->timestamp = time();
            	$activity->activity_id = $client['id'];
            	if($activity->save()){
            		return 'OK';
            	}else{
            		return 'Не сохранено действие';
            	}
            }else{
            	return 'Не сохранен новый клиент';
            }
        }

    }
}
