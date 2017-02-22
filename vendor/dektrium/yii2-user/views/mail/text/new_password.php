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

<?= Yii::t('user', 'Ваша учетная запись на {0} имеет новый пароль', Yii::$app->name) ?>.
<?= Yii::t('user', 'Мы сформировали пароль для вас') ?>:
<?= $user->password ?>

<?= Yii::t('user', 'Если вы не делали этого запроса вы можете проигнорировать это сообщение') ?>.
