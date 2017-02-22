<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $model
 * @var dektrium\user\models\Account $account
 */

$this->title = Yii::t('user', 'Авторизация');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info">
                    <p>
                        <?= Yii::t(
                            'user',
                            'Для того чтобы закончить вашу регистрацию, нам необходимо ввести следующие поля'
                        ) ?>:
                    </p>
                </div>
                <?php $form = ActiveForm::begin([
                    'id' => 'connect-account-form',
                ]); ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?= Html::submitButton(Yii::t('user', 'Войти'), ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(
                Yii::t(
                    'user',
                    'Если вы уже зарегистрированы, войдите в систему и подключить эту учетную запись на странице настроек'
                ),
                ['/user/settings/networks']
            ) ?>.
        </p>
    </div>
</div>
