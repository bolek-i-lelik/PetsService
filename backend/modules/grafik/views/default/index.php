<div class="row">
    <div class="panel-group" id="accordion">
        <?php foreach($departments as $department):?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#department<?= $department['id'] ?>">
                            <?= $department['name'] ?>
                        </a>
                    </h4>
                </div>
                <div id="department<?= $department['id'] ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>
                                    <b>Фамилия, Имя и Отчество</b>
                                </td>
                                <td>
                                    <b>Должность</b>
                                </td>
                                <td>
                                    <b>Телефон</b>
                                </td>
                                <td>
                                    <b>email</b>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <?php foreach($workers[$department['id']] as $employee):?>
                                <tr>
                                    <td>
                                        <?= $employee['familie'].' '.$employee['name'].' '.$employee['father'] ?>
                                    </td>
                                    <td>
                                        <?= $employee['position'] ?>
                                    </td>
                                    <td>
                                        <?= $employee['phone'] ?>
                                    </td>
                                    <td>
                                        <?= $employee['email'] ?>
                                    </td>
                                    <td>
                                        <a href="/grafik/default/worker?id=<?= $employee['id'] ?>">График</a>
                                    </td>
                                </tr>
                            <?php endforeach;?>        
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>