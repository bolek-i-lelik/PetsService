<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;
        
        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...
        
        // Создадим роли админа и редактора новостей
        $admin = $auth->createRole('admin');
        $clinic = $auth->createRole('clinic');
        $manager = $auth->createRole('manager');
        $worker = $auth->createRole('worker');
        
        // запишем их в БД
        $auth->add($admin);
        $auth->add($clinic);
        $auth->add($manager);
        $auth->add($worker);
        
        // Создаем разрешения. Например, просмотр админки viewAdminPage и редактирование новости updateNews
        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Администрирование ресурса полностью';
        
        $adminClinic = $auth->createPermission('adminClinic');
        $adminClinic->description = 'Администрирование клиник';

        $managerPanel = $auth->createPermission('managerPanel');
        $managerPanel->description = 'Работа руководителя';

        $workerPanel = $auth->createPermission('workerPanel');
        $workerPanel->description = 'Панель для сотрудника';
        
        // Запишем эти разрешения в БД
        $auth->add($viewAdminPage);
        $auth->add($adminClinic);
        $auth->add($managerPanel);
        $auth->add($workerPanel);
        
        // Теперь добавим наследования. Для роли editor мы добавим разрешение updateNews,
        // а для админа добавим наследование от роли editor и еще добавим собственное разрешение viewAdminPage
        
        // Роли «Редактор новостей» присваиваем разрешение «Редактирование новости»
        $auth->addChild($clinic,$adminClinic);

        $auth->addChild($manager, $managerPanel);

        $auth->addChild($worker, $workerPanel);

        // админ наследует роль редактора новостей. Он же админ, должен уметь всё! :D
        $auth->addChild($admin, $clinic);
        $auth->addChild($admin, $manager);
        $auth->addChild($admin, $worker);
        
        // Еще админ имеет собственное разрешение - «Просмотр админки»
        $auth->addChild($admin, $viewAdminPage);

        // Назначаем роль admin пользователю с ID 1
        //$auth->assign($admin, 2); 
        
        // Назначаем роль editor пользователю с ID 2
        //$auth->assign($clinic, 3);
    }
}