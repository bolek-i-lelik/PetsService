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
 * @var dektrium\user\models\User   $user
 * @var dektrium\user\models\Token  $token
 */
?>
<?= Yii::t('user', 'Здравствуйте') ?>,

<?= Yii::t('user', 'Мы получили запрос на сброс пароля учетной записи на {0}', Yii::$app->name) ?>.
<?= Yii::t('user', 'Пожалуйста, нажмите на ссылку ниже, чтобы завершить сброс пароля') ?>.

<?= $token->url ?>

<?= Yii::t('user', 'Если вы не можете нажать на ссылку, пожалуйста, попробуйте вставить текст в вашем браузере') ?>.

<?= Yii::t('user', 'Если вы не делали этого запроса вы можете проигнорировать это сообщение') ?>.
