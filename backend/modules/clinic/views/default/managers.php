<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-info">
        	<div class="panel-heading">Информация о руководителе</div>
        	<div class="panel-body">
        		<div class="row">
    				<div class="col-lg-10 col-lg-offset-1">
      					<form class="form-horizontal" role="form">
        					<div class="form-group">
          						<label for="name" class="col-sm-3 control-label">Имя</label>
          						<div class="col-sm-9">
            						<input type="text" class="form-control" id="name" placeholder="Имя">
          						</div>
        					</div>
        					<div class="form-group">
          						<label for="familie" class="col-sm-3 control-label">Фамилия</label>
          						<div class="col-sm-9">
            						<input type="text" class="form-control" id="familie" placeholder="Фамилия">
          						</div>
        					</div>
        					<div class="form-group">
          						<label for="father" class="col-sm-3 control-label">Отчество</label>
          						<div class="col-sm-9">
            						<input type="text" class="form-control" id="father" placeholder="Отчество">
          						</div>
        					</div>
        					<div class="form-group">
          						<label for="position" class="col-sm-3 control-label">Должность</label>
          						<div class="col-sm-9">
            						<input type="text" class="form-control" id="position" placeholder="Должность">
          						</div>
        					</div>
        					<div class="form-group">
          						<label for="phone" class="col-sm-3 control-label">Телефон</label>
          						<div class="col-sm-9">
            						<input type="text" class="form-control" id="phone" placeholder="Телефон">
          						</div>
        					</div>
        					<div class="form-group">
          						<label for="email" class="col-sm-3 control-label">email</label>
          						<div class="col-sm-9">
            						<input type="email" class="form-control" id="email" placeholder="email">
          						</div>
        					</div>
        					<div class="form-group">
          						<div class="col-sm-offset-2 col-sm-10">
            						<button type="button" onclick="saveInfoAboutClinic(<?= Yii::$app->user->id ?>)" class="btn btn-default">Сохранить</button>
          						</div>
        					</div>
      					</form>
    				</div>
				</div>
        	</div>
        </div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-info">
	        <div class="panel-heading">Пользователи</div>
	        <div class="panel-body">
	        	<select class="form-control" placeholder="Пользователи">
	        		<?php foreach ($users as $user):?>
	        			<option><?= $user->username ?></option>
	        		<?php endforeach;?>
	        	</select>
	        	<br/>
	        	<p>Если пользователь отсутствует в списке, то зарегистрируйте его прямо сейчас. ВНИМАНИЕ! Необходимо сохранить логин и пароль для дальнейшей авторизации!</p>
	        	<br/>
	        	<form class="form-horizontal" role="form">
        			<div class="form-group">
          				<label for="email" class="col-sm-3 control-label">email</label>
          				<div class="col-sm-9">
            				<input type="email" class="form-control" id="user_email" placeholder="email">
          				</div>
        			</div>
        			<div class="form-group">
          				<label for="login" class="col-sm-3 control-label">Логин</label>
          				<div class="col-sm-9">
            				<input type="text" class="form-control" id="user_login" placeholder="Логин">
          				</div>
        			</div>
        			<div class="form-group">
          				<label for="password" class="col-sm-3 control-label">Пароль</label>
          				<div class="col-sm-9">
            				<input type="password" class="form-control" id="user_password" placeholder="Пароль">
          				</div>
        			</div>
        			<div class="form-group">
          				<div class="col-sm-offset-2 col-sm-10">
            				<button type="button" onclick="saveUser(<?= Yii::$app->user->id ?>)" class="btn btn-default">Сохранить</button>
          				</div>
        			</div>
      			</form>
	        </div>
	    </div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
	        <div class="panel-heading">Информация о руководителях</div>
	        <div class="panel-body">
	        </div>
	    </div>
	</div>
</div>