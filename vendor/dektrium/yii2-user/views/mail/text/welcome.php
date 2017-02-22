<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var dektrium\user\models\User
 */
?>
<?= Yii::t('user', 'Здравствуйте') ?>,

<?= Yii::t('user', 'Ваша учётная запись на {0} была успешно создана', Yii::$app->name) ?>.
<?php if ($module->enableGeneratingPassword): ?>
<?= Yii::t('user', 'Мы сформировали пароль для вас') ?>:
<?= $user->password ?>
<?php endif ?>

<?php if ($token !== null): ?>
<?= Yii::t('user', 'Для завершения регистрации, пожалуйста, перейдите по ссылке ниже') ?>.

<?= $token->url ?>

<?= Yii::t('user', 'Если вы не можете нажать на ссылку, пожалуйста, попробуйте вставить текст в вашем браузере') ?>.
<?php endif ?>

<?= Yii::t('user', 'Если вы не делали этого запроса вы можете проигнорировать это сообщение') ?>.
