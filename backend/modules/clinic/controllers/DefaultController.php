<?php

namespace app\modules\clinic\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\modules\clinic\models\{
    Adress,
    Workers,
    Departments,
    Clinic
};
use dektrium\user\models\User;

/**
 * Default controller for the `clinic` module
 */
class DefaultController extends Controller
{

	public $layout = 'clinic';

	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['adminClinic']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;

        $clinic = Clinic::find()->where(['user_id' => $user_id])->one();

        if(isset($clinic->id)){
            $departments = Departments::find()->where(['parent_id'=>$clinic->id])->all();

            foreach ($departments as $department) {
                $manager = Workers::find()->where(['id'=>$department->manager_id])->one();
                $department->manager_id = $manager['familie'].' '.$manager['name'].' '.$manager['father'];
            }
        }else{
            $departments = 0;
            $managers = 0;
        }

        $managers = Workers::find()->where(['specification' => 1])->andWhere(['parent' => $clinic['id']])->all();
        
        return $this->render('index',[
            'departments' => $departments,
            'clinic' => $clinic,
            'managers' => $managers,
        ]);
    }

    public function actionCreateinfo()
    {
        if(Yii::$app->request->isAJAX ){
            $query = Yii::$app->request->post();
            
            $id = $query['id'];
            $name = $query['name'];
            $adress = $query['adress'];
            $phone = $query['phone'];
            $email = $query['email'];
            $site = $query['site'];

            $clinic = Clinic::find()->where(['user_id'=>$id])->one();
            if(isset($clinic)){
                $clinic->name = $name;
                $clinic->adress = $adress;
                $clinic->phone = $phone;
                $clinic->email = $email;
                $clinic->site = $site;
                $clinic->user_id = $id;
                if($clinic->save()){
                    $answer = array([
                        'id'=>$id,
                        'name'=>$name,
                        'adress'=>$adress,
                        'phone'=>$phone,
                        'email'=>$email,
                        'site'=>$site
                    ]);
                    $answer = json_encode($answer);

                    return $answer;
                }else{
                    echo 'Информация не сохранена';
                }    
            }

            $clinic = new Clinic();
            $clinic->name = $name;
            $clinic->adress = $adress;
            $clinic->phone = $phone;
            $clinic->email = $email;
            $clinic->site = $site;
            $clinic->user_id = $id;
            if($clinic->save()){
                $answer = array([
                    'id'=>$id,
                    'name'=>$name,
                    'adress'=>$adress,
                    'phone'=>$phone,
                    'email'=>$email,
                    'site'=>$site
                ]);
                $answer = json_encode($answer);

                return $answer;
            }else{
                echo 'Информация не сохранена';
            }
        }

        return true;
    }

    public function actionManagers()
    {
        $users = User::find()->where(['parent_id' => Yii::$app->user->id])->all();

        $clinic = Clinic::find()->where(['user_id' => Yii::$app->user->id])->one();
        $clinic_id = $clinic['id'];

        $managers = Workers::find()->where(['parent' => $clinic_id])->andWhere(['specification'=>'1'])->all();

        return $this->render('managers',[
            'users' => $users,
            'clinic_id' => $clinic_id,
            'managers' => $managers,
        ]);

    }

    public function actionCreateuser()
    {

        if(Yii::$app->request->isAJAX ){
            $query = Yii::$app->request->post();

            $parent = $query['id'];
            $email = $query['email'];
            $login = $query['login'];
            $password = $query['password'];
            $role = $query['role'];

            $password = Yii::$app->security->generatePasswordHash($password, Yii::$app->getModule('user')->cost);

            $user = new User();
            $user->username = $login;
            $user->email = $email;
            $user->password_hash = $password;
            $user->parent_id = $parent;
            $user->role = $role;
            if($user->save()){

                $user = User::find()->where(['username'=>$login])->one();

                switch($query['role']){
                    case 'manager':
                        $auth = Yii::$app->authManager;
                        $manager = $auth->getRole('manager'); // Получаем роль manager
                        $auth->assign($manager, $user['id']);
                        break;
                    case 'worker':
                        $auth = Yii::$app->authManager;
                        $worker = $auth->getRole('worker'); // Получаем роль worker
                        $auth->assign($worker, $user['id']);
                        break;
                }

                return 'OK';
            }else{
                return 'faile';
            }
        }

    }

    public function actionCreatemanager()
    {

        if(Yii::$app->request->isAJAX ){
            $query = Yii::$app->request->post();

            $user = User::find()->where(['username' => $query['username']])->one();
            $user_id = $user['id'];

            $manager = new Workers();
            $manager->name = $query['name'];
            $manager->familie = $query['familie'];
            $manager->father = $query['father'];
            $manager->position = $query['position'];
            $manager->phone = $query['phone'];
            $manager->email = $query['email'];
            $manager->specification = '1';
            $manager->user_id = $user_id;
            $manager->parent = $query['parent'];
            if($manager->save()){
                return 'OK';
            }else{
                return 'False';
            }

        }

    }

    public function actionCreatedepartment()
    {

        if(Yii::$app->request->isGET ){
            $query = Yii::$app->request->get();

            $manager = Workers::find()->where(['id' => $query['manager']])->one();
            $clinic = Clinic::find()->where(['id' => $query['parent']])->one();

            $department = new Departments;
            $department->name = $query['name'];
            $department->adress = $query['adress'];
            $department->phone = $query['phone'];
            $department->email = $query['email'];
            //$department->parent_id = $query['parent'];
            //$department->manager_id = $query['manager'];
            $department->updated_at = time();

            $department->manager_id = $manager['id'];
            $department->parent_id = $clinic['id'];
            //$department->link('manager_id', $manager);
            if($department->save()){
                return 'OK';
            }else{
                return 'False';
            }

        }

    }

    public function actionWorkers()
    {

        if(Yii::$app->request->isGET ){
            $query = Yii::$app->request->get();

            $department = Departments::find()->where(['id' => $query['id']])->one();

            $users = User::find()->where(['parent_id' => $query['id']])->all();

            $workers = Workers::find()->where(['specification' => '2'])->andWhere(['parent' => $query['id']])->all();

            return $this->render('workers',[
                'id' => $query['id'],
                'workers' => $workers,
                'users' => $users,
                'department' => $department,
            ]);

        }
    }

    public function actionCreateworker()
    {

        if(Yii::$app->request->isAJAX ){
            $query = Yii::$app->request->post();

            $user = User::find()->where(['username' => $query['username']])->one();
            $user_id = $user['id'];

            $manager = new Workers();
            $manager->name = $query['name'];
            $manager->familie = $query['familie'];
            $manager->father = $query['father'];
            $manager->position = $query['position'];
            $manager->phone = $query['phone'];
            $manager->email = $query['email'];
            $manager->specification = '2';
            $manager->user_id = $user_id;
            $manager->parent = $query['parent'];
            if($manager->save()){
                return 'OK';
            }else{
                return 'False';
            }

        }

    }
}
