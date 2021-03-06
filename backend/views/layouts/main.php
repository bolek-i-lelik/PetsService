<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    if(Yii::$app->user->can('worker')){
        NavBar::begin([
            'brandLabel' => 'PetsService',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $navItems=[
            ['label' => 'Личный кабинет', 'url' => ['/user/settings/']],
            ['label' => 'Регистратура', 'url' => ['/clients/default/new']],
            ['label' => 'Приём', 'url' => ['/site/about']],
            ['label' => 'Пациенты', 'url' => ['/site/contact']]
        ];
    }
    else if(Yii::$app->user->can('manager')){
        NavBar::begin([
            'brandLabel' => 'PetsService',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $navItems=[
            ['label' => 'Личный кабинет', 'url' => ['/user/settings/']],
            ['label' => 'Графики работы', 'url' => ['/grafik/default/']],
            ['label' => 'Отчёты', 'url' => ['/site/about']],
            ['label' => 'Склад', 'url' => ['/site/contact']]
        ];
    }
    else{
        NavBar::begin([
            'brandLabel' => 'PetsService',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $navItems=[
            ['label' => 'Личный кабинет', 'url' => ['/user/settings/']],
            ['label' => 'Status', 'url' => ['/status/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']]
        ];
    }
    if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => 'Войти', 'url' => ['/user/login']],['label' => 'Sign Up', 'url' => ['/user/register']]);
    } else {
        array_push($navItems,['label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']]
        );
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; PetsPolis <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
