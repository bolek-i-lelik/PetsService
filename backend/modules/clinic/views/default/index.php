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
                <a href="managers" class="btn btn-primary">Создать</a>
            <?php else:?>

            <?php endif;?>
            <?php if(empty($adresses)):?>
                <p>Не внесены параметры клиник и/или филиалов</p>
                <button class="btn btn-primary" onclick="showNewDepartmentsForm()">Добавить</button>
                <div id="newDepartmentsForm" class="newDepartmentsForm" style="display: none;">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="department_name" class="col-sm-3 control-label">Название</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department_name" placeholder="Название">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department_adress" class="col-sm-3 control-label">Адрес</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department_adress" placeholder="Адрес">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department_phone" class="col-sm-3 control-label">Телефон</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="department_phone" placeholder="Телефон">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department_email" class="col-sm-3 control-label">email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="department_email" placeholder="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="manager" class="col-sm-3 control-label">Руководитель</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="manager">
                                    <option disabled>Руководители</option>
                                    <?php foreach ($managers as $manager):?>
                                        <option value="<?= $manager->id ?>"><?= $manager->familie.' '.$manager->name.' '.$manager->father ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" onClick="saveInfoAboutDepartment(<?= $clinic['id'] ?>)" class="btn btn-default">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php else:?>
                <?= var_dump($adresses) ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      
                    </table>
                </div>
            <?php endif;?>
        </div>
    </div>
    
</div>
