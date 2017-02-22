<?php
    $user_id = Yii::$app->user->id;
?>

<div class="clinic-default-index">
    <div class="panel panel-info">
        <div class="panel-heading">Общая информация</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#" class="thumbnail">
                        <img src="/uploads/logo.png" alt="...">
                    </a>
                </div>
                <div class="col-lg-8">
                    <?php if($clinic): ?>
                        <table>
                            <tr>
                                <td>Название</td>
                                <td><?= $clinic->name ?></td>
                            </tr>
                            <tr>
                                <td>Адрес</td>
                                <td><?= $clinic->adress ?></td>
                            </tr>
                            <tr>
                                <td>Телефон</td>
                                <td><?= $clinic->phone ?></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><?= $clinic->email ?></td>
                            </tr>
                            <tr>
                                <td>сайт</td>
                                <td><?= $clinic->site ?></td>
                            </tr>
                        </table>
                    <?php else:?>
                        <div class="alert alert-danger">
                            Информация о вашей клинике/сети клиник отсутствует. Пожалуйста заполните!&nbsp;&nbsp;&nbsp;&nbsp;    
                            <button type="button" class="btn btn-danger" onclick="addInfoAboutClinic(<?= $user_id ?>)">Заполнить</button>
                        </div>
                    <?php endif; ?>
                    <div id="clinic_info"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">Адреса клиник и филиалов</div>
        <div class="panel-body">
            <?php if(empty($managers)):?>
                <p>Отсутствуют руководители. Внесите информацию о руководителях клиник и филиалов</p>
                <a href="default/managers" class="btn btn-primary">Создать</a>
            <?php else:?>

            <?php endif;?>
            <?php if(empty($adresses)):?>
                <p>Не внесены параметры клиник и/или филиалов</p>
            <?php else:?>
                <?= var_dump($adresses) ?>
            <?php endif;?>
        </div>
    </div>
    
</div>
